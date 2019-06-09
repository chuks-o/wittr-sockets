<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    protected $fillable = [
        'message', 'user_id', 'post_id',
    ];

    protected $with = ['creator'];

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }

    public function creator() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
