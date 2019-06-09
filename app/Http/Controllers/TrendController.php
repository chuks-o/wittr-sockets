<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trend;
use App\Post;

class TrendController extends Controller
{

    public function index($trend) 
    {
        return view('trend', compact('trend'));
    }

    public function getTimeLineTrends(Request $request, Post $post, $trend) 
    {
        $total_tweets = auth()->user()->posts()->count();
        $posts = $post->where('body', 'LIKE', '%'.'#'.$trend.'%')
            ->withCount('likes')
            ->with(['user','likes','userLikes'])
            ->orderBy('created_at', 'desc')
            ->take($request->get('limit', 25))
            ->get();

        return response()->json(['posts' => $posts, 'total_tweets' => $total_tweets]);
    }

    public function getTrends() 
    {
        $trends = Trend::all()->take(10);
        return response()->json(['trends' => $trends]);
    }

    public function saveTrend(Request $request) 
    {
        Trend::insert($request->body);
        return response()->json(['message' => 'Trend has been saved successfully']);
    }
}
