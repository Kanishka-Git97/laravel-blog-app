<?php
namespace App\Http\Controllers;
use App\Models\Post;

class PagesController extends Controller{

    public function getIndex(){
        // Store the all the Posts from the database return the list of posts for the view
        $posts = Post::all();
        return view('pages.home')->with('posts', $posts);
    }
}
