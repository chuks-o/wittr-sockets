<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Events\PostLikedEvent;
use App\Events\PostUnlikedEvent;

class LikeController extends Controller
{
    public function favorite(Post $post) 
    {  
        Auth::user()->likes()->attach($post->id);
        $post = Post::find($post->id);

        broadcast(new PostLikedEvent($post));
        
        return response()->json([
            'status' => 'success',
            'message' => 'post favorited',
            'post' => $post,
        ], 200);
    }

    public function unFavorite(Post $post) 
    {
        Auth::user()->likes()->detach($post->id);
        $post = Post::find($post->id);

        broadcast(new PostUnlikedEvent($post));

        return response()->json([
            'status' => 'success',  
            'message' => 'post unfavorited',
            'post' => $post
        ], 200);
    }
}
