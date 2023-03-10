<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('posts.create');
        }
        return view('error.404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the request
        $this->validate($request, array(
            'title'=> 'required|max:255',
            'body'=>'required',
            'user_id'=>'required|integer'
        ));
        // Store the Database
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;

        $post->save();
        if(!$post){
            return redirect(route('posts.create'))->with('error', 'Something went wrong Please try again');
        }
        // Redirection
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the resource and return with the information
        if(Auth::check()){
            $post=Post::find($id);
            return view('posts.edit')->with('post', $post);
        }
        return view('error.404');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request parameters
        // Validate the request
        $this->validate($request, array(
            'title'=> 'required|max:255',
            'body'=>'required'
        ));

        // Grab the existing post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Store the request parameters
        $post->save();
        // Redirect to the view
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the resource
        $post= Post::find($id);
        $post->delete();
        return redirect()->route('index');
    }
}
