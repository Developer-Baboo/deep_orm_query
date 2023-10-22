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
        /*
        // onloy post info
        $post = Post::whereSlug($slug)->first();
        dd($post->toArray()); */

        //post with user, tag info, ka ya post kis na likhe ha or us pa kitna and konsa tags han
        /* $post = Post::whereSlug($slug)
            ->with(['user', 'tags'])
            ->first();
        dd($post->toArray()); */

        //post with user, tag info and us pr kitna likes han
        /* $post = Post::whereSlug($slug)
            ->withCount(['likes'])
            ->with(['user', 'tags'])
            ->first();
        dd($post->toArray()); */

        /* //post with user, tag info and us pr kitna likes han with likes info ka ya like kis user na kya ha
        $post = Post::whereSlug($slug)
            ->withCount(['likes'])
            ->with([
                'user',
                'tags',
                'likes.user'
                ])
            ->first();
            dd($post->toArray());
            */

            //post with user, tag info and us pr kitna likes han with likes info ka ya like kis user na kya ha with comment
        $post = Post::whereSlug($slug)
            ->withCount(['likes'])
            ->with([
                'user',
                'tags',
                //we have defined the user relation in like model
                'likes.user',
                //we have defined user relation in comment model
                'comments.user',
                //comments like
                'comments.likes',
                //comments replies with user info ka kis na commnet pa reply kya. us reply pa kitna like aya han

                'comments.replies'=>function($q){
                    $q->with('user');
                    $q->withCount('likes');
                    $q->with('likes.user');

                }
                ])
            ->first();
            dd($post->toArray());



    }
}
