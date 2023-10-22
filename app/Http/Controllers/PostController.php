<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        return view('welcome', [
            'posts' => Post::with('user:id,name')->select('user_id', 'title', 'slug', 'created_at')->paginate(10)
        ]);
    }
    function view($slug){
        dd($slug);
        // $post = Post::whereSlug($slug)
        //     ->first();
        // return view('details', ['post' => $post]);
    }
}
