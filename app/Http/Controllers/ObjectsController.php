<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\CreateObjectRequest;
use App\Object;
use Auth;
use Session;
use DB;
use App\Room;
use App\Photo;

class ObjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>'welcome']);
    }

    /* Pobieramy listę obiektów */
    public function index()
    {
    	$objects = Object::latest()->get();
    	return view('adminlte::obiekty.index')->with('objects', $objects);
    }

    /* Wyświetla formularz dodawania obiektu */
    public function create()
    {
    	return view('adminlte::obiekty.create');
    }

    public function googlemaps()
    {
        return view('adminlte::obiekty.googlemaps');
    }

    public function gmaps()
    {
        $objects = DB::table('objects')->get();
     //   $objects = DB::table('users')->select('name', 'email as user_email')->get();
        return view('adminlte::master',compact('objects'));
    }

    /*Metoda wyciąga filmy z kategorii
    public function show($type)
    {
    	$object = Object::find($type);
    	return $object;
    }
*/
    /* Zapisujemy objekt do tabeli */
    public function store(CreateObjectRequest $request){
    //	$input = Request::all();
    //	Object::create($input);

        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->objects()->create($input);
        Session::flash('object_created', 'Nowy obiekt został zapisany poprawnie!');
        return redirect('obiekty');

    }

    /*Formularz edycji obiektu */
    public function edit($id)
    {
        $object = Object::findOrFail($id);
        return view('adminlte::obiekty.edit')->with('object', $object);
    }

    /*Aktualizacja obiektu*/
    public function update($id, CreateObjectRequest $request)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->objects()->whereId($id)->first()->update($input);
       // var_dump($input);
        return redirect('obiekty');


/*
        $object = Object::findOrFail($id);
        $object->update($request->all());
        return redirect('obiekty');
*/
    }

    public function destroy($id)
    {
        $obiekt = Object::findOrFail($id)->delete();
        Session::flash('object_destroyed', 'Obiekt został usunięty poprawnie!');
        return redirect('obiekty');
    }

    public function object($id){

        $object = Object::findOrFail($id);

        return view('adminlte::object', compact('object'));

    }

}
