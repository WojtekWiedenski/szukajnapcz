<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Object;
use App\User;
use App\Room;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $objects = Object::latest()->limit(5)->get();
        $users = User::latest()->limit(5)->get();
        $count_users = User::count();
        $count_objects = Object::count();
        $count_rooms = Room::count();
        return view('adminlte::home', compact('objects','users','count_users', 'count_objects', 'count_rooms'));
    }
}