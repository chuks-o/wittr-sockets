<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Events\TweetPostedEvent;

class PostController extends Controller
{

    public function index(Request $request, Post $post) 
    {
        $total_tweets = auth()->user()->posts()->count();
        $posts = $post->whereIn('user_id', auth()->user()->following()->pluck('users.id')->push(auth()->user()->id))
            ->orderBy('created_at', 'desc')
            ->take($request->get('limit', 25))
            ->get();

        return response()->json(['posts' => $posts, 'total_tweets' => $total_tweets]);
    }

    public function store(Request $request, Post $post) 
    {
        $new_tweet = auth()->user()->posts()->create([
            'body' => $request->get('body')
        ]);

        $total_tweets = auth()->user()->posts()->count();

        broadcast(new TweetPostedEvent($post->find($new_tweet->id), $total_tweets));

        return response([
            'message' => $new_tweet ? 'New tweet has been added': 'An error occured, Try again',
            'status' => 'success'
        ], 201);
    }

}
