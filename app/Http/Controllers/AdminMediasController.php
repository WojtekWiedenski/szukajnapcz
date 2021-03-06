<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    public function index(){

    	$photos = Photo::all();

		return view('adminlte::media.index', compact('photos'));

    }

    public function create(){

    	

		return view('adminlte::media.create');

    }

    public function store(Request $request){

    	$file = $request->file('file');
    	$name = time() . $file->getClientOriginalName();
    	$file->move('images', $name);

    	Photo::create(['file'=>$name]);

    }
}
