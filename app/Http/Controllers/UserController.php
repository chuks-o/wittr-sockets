<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UserController extends Controller
{
    public function show(User $user) 
    {
        $response = $this->getUserFollowingStatus($user);
        return view('profile', compact('user','response'));
    }

    public function getUserFollowingStatus($user) 
    {
        $response = [
            'can_follow' => auth()->user()->canFollow($user),
            'is_following' => auth()->user()->isFollowing($user),
            'is_my_profile' => auth()->user()->isMe($user),
            'followers_count' => $user->followersCount(),
            'following_count' => $user->followingCount()
        ];
        return $response;
    }
    
    public function follow(Request $request, User $user) 
    {
        if (auth()->user()->canFollow($user)) {
            auth()->user()->following()->attach($user);
        }
        return response()->json(['status'=>'success','message'=>'You have followed this person', 'code' => 1]);
    }

    public function unfollow(User $user) 
    {
        if(auth()->user()->isFollowing($user)) {
            auth()->user()->following()->detach($user);
        }
        return response()->json(['status'=>'success','message'=>'You have unfollowed this person', 'code' => 0]);
    }

    public function getPersonalTweets(Request $request, Post $post, User $user) 
    {
        $total_tweets = auth()->user()->posts()->count();
        $posts = $post->where('user_id', $user->id)
            ->withCount('likes')
            ->with(['user','likes','userLikes'])
            ->orderBy('created_at', 'desc')
            ->take($request->get('limit', 25))
            ->get();

        return response()->json(['posts' => $posts, 'total_tweets' => $total_tweets]);
    }

}
