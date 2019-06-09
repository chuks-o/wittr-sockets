<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{

    public function createComment(Post $post, Request $request) 
    {
        $comment = $post->comments()->create([
            'message' => $request->message,
            'post_id' => $request->post_id,
            'user_id' => auth()->id()
        ]);

        return response([
            'comment' => $comment ? $comment->with('creator')->first() : [],
            'status' => $comment ? 'success' : 'error',
            'message' => $comment ? 'Comment has been created successfully' : 'An error occured, Try again'
        ], 201);
    }

    public function getPostComments(Post $post) 
    {
        $comments = $post->comments;

        return response([
            'status' => 'success',
            'comments' => $comments ? $comments : [],
            'message' => count($comments) > 0 ? 'Comments are here' : 'An error occured, Try again'
        ], 200);
    }
}
