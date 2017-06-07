<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact()
    {
    	return view('adminlte::post');
    }

	public function about()
    {
    	return 'To jest strona O projekcie';
    }    
}
