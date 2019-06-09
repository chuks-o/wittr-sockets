<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['user_id', 'body'];

    protected $appends = ['createdDate', 'createdTime'];

    protected $with = ['user', 'likes', 'userLikes', 'comments'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function userLikes() 
    {
        return $this->likes()->where('user_id', auth()->id());
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function getCreatedDateAttribute() 
    {
        return $this->created_at->diffForHumans();
    }

    public function getCreatedTimeAttribute() 
    {
        $current_date = Carbon::now();
        $created_date = $this->created_at;

        if ($created_date->diffInDays($current_date) >= 1) {
            $created = $this->created_at->format('M d');
        } else if ($created_date->diffInHours($current_date) >= 1) {
            $created = $created_date->diffInHours($current_date). 'h';
        } else if($created_date->diffInMinutes($current_date) >= 1) {
            $created = $created_date->diffInMinutes($current_date). 'm';
        } else {
            $created = $created_date->diffInSeconds($current_date). 's';
        }

        return $created;
    }
}
