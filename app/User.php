<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password','slug'
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


    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Commentary');
    }

    public function message()
    {
        return $this->hasMany('App\Message');
    }

    public function reportsMade()
    {
        return $this->hasMany('App\Report', 'accuser_id');
    }

    public function reportsReceived()
    {
        return $this->hasMany('App\Report', 'accused_id');
    }

    public function scopeName($query, $name)
    {
        if($name)
        {
            return $query->orWhere('name','LIKE', "%$name%");
        }
    }

    public function scopeLastName($query, $lastname)
    {
        if($lastname)
        {
            return $query->orWhere('lastname','LIKE', "%$lastname%");
        }
    }

    public function scopeEmail($query, $email)
    {
        if($email)
        {
            return $query->orWhere('email','LIKE', "%$email%");
        }
    }
}
