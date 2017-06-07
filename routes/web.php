<?php

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Room;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/pinezki', 'ObjectsController@gmaps');

/*
Route::get('/', function () {
    return view('adminlte::master');
});
*/

/*Zwraca widok szczegolowy o jednej sali/pomieszczeniu */
Route::get('/room/{id}', ['as'=>'home.room', 'uses'=>'RoomsController@room']);

/*Zwraca widok szczegolowy o jednej sali/pomieszczeniu */
Route::get('/object/{id}', ['as'=>'home.object', 'uses'=>'ObjectsController@object']);


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/gmaps', function () {
    return view('gmaps');
});

Route::get('/', function () {
    return view('adminlte::layouts.hello');
});

Route::get('/szukaj', function () {
    return view('adminlte::szukaj');
});

Route::group(['middleware'=>'admin'], function(){

	Route::resource('adminlte.users', 'AdminUsersController');

	Route::resource('adminlte.posts', 'AdminPostsController');

});

Route::get('/mapa', function () {
    return view('mapa');
});

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

//Route::get('/post/{id}', 'PostsController@index');

//Route::resource('post', 'PostsController');

//Route::get('/contact', 'PostsController@contact');

//Route::get('/post/{id}/{name}/{surname}', 'PostsController@show_post');


/* zapisywanie danych z DB */
Route::get('/insert', function(){

	DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel 2', 'Laravel jest zajebisty naprawdę']);

});

/*cztanie danych z DB 

Route::get('/read', function() {

 $results = DB::select('select * from posts where id = ?', [1]);

 foreach($results as $post){
 	return $post->title;
 }
});
*/
/*uaktualnianie danych*/

Route::get('/update', function(){
	$updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

	return $updated;
});

/*usuwanie danych */

Route::get('/delete', function(){

	$deleted = DB::delete('delete from posts where id = ?', [1]);

	return $deleted;
});

Route::get('/read', function(){

$posts = Post::all();

	foreach($posts as $post){
		return $post->title;
	}

});

Route::get('/findwhere', function(){
	$posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

	return $posts;
});

/*
Route::get('/findmore', function(){

	$posts = Post::findOrFail(1);
	return $posts;

	$posts = Post:where('users_count', '<', 50)->firstOrFail();

});
*/

Route::get('/kontakt', 'PagesController@contact');

Route::get('/o-projekcie', 'PagesController@about');

/*
Route::post('/obiekty', 'ObjectsController@store');
Route::get('/obiekty', 'ObjectsController@index');
Route::get('/obiekty/googlemaps', 'ObjectsController@googlemaps');
Route::get('/obiekty/dodaj', 'ObjectsController@create');
Route::get('/obiekty/{id}', 'ObjectsController@show');
*/

Route::resource('media','AdminMediasController');

Route::resource('categories','AdminCategoriesController');

Route::resource('users','AdminUsersController');

Route::resource('posts','AdminPostsController');

Route::get('/obiekty/googlemaps', 'ObjectsController@googlemaps');
Route::get('/obiekty/dodaj', 'ObjectsController@create');

Route::resource('obiekty','ObjectsController');

Route::resource('rooms','RoomsController');
/*
Route::get('/room', function(){

	$user = User::findOrFail(7);

	//$room = new Post(['name'=>'B-2','description'=>'Lolek jakis krejzolek']);

	$user->rooms()->save(new Room(['name'=>'B-2','description'=>'Lolek jakis krejzolek']));

});
*/