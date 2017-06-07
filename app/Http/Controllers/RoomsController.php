<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\RoomsCreateRequest;
use App\Object;
use App\User;
use App\Post;
use App\Room;
use App\Photo;
use Auth;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('adminlte::rooms.index', compact('rooms'));
       // var_dump($rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objects = Object::pluck('name','id')->all();

        return view('adminlte::rooms.create', compact('objects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        $user->rooms()->create($input);

        return redirect('rooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::findOrFail($id);
        return view('adminlte::rooms.edit', compact('rooms'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomsCreateRequest $request, $id)
    {
        
        $input = $request->all();

        Auth::user()->rooms()->whereId($id)->first()->update($input);

        return redirect('rooms');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        //unlink(public_path() . $post->photo->file);
        $room->delete();
        return redirect('rooms');
    }

    public function room($id){

        $room = Room::findOrFail($id);

        return view('adminlte::room', compact('room'));

    }

}
