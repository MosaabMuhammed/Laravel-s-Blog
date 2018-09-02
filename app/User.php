<?php

namespace App;

use App\Post;
use App\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];
    protected $with = ['profile'];
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot () 
    {
        parent::boot();

        static::deleting(function($user) {
            $user->profile->delete();
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
