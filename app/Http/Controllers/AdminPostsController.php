<?php

namespace App\Http\Controllers;

use App\Category;
use Request;
use App\Http\Requests\PostsCreateRequest;
use App\Object;
use App\User;
use App\Post;
use App\Photo;
use Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('adminlte::posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('adminlte::posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        return redirect('posts');

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
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        return view('adminlte::posts.edit', compact('post','categories'));
        //return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
        $input = $request->all();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //unlink(public_path() . $post->photo->file);
        $post->delete();
        return redirect('posts');
    }
}
