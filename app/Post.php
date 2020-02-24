<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ['category', 'title', 'description', 'animal_type'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function comments()
    {
    	 return $this->hasMany('App\Commentary');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }

    public function zone()
    {
    	return $this->belongsTo('App\Zone');
    }


}
