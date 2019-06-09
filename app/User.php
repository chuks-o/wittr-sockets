<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['profileLink'];

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
    
    public function following() 
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followers() 
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function likes() 
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    public function userLikes() 
    {
        return $this->likes()->where('user_id', auth()->id());
    }

    public function followersCount() 
    {
        return $this->followers->count();
    }

    public function followingCount() 
    {
        return $this->following->count();
    }

    public function isNot($user) 
    {
        return $this->id !== $user->id;
    }

    public function isFollowing($user) 
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function isNotFollowing($user) 
    {
        return ! $this->isFollowing($user);
    }

    public function isMe($user) 
    {
        return ! $this->isNot($user);
    }

    public function canFollow($user) 
    {
        if ($this->isMe($user)) {
            return false;
        }
        return $this->isNotFollowing($user);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getProfileLinkAttribute() 
    {
        return route('user.show', $this);
    }
}
