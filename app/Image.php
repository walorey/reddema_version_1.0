<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = ['ruta', 'post_id'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function getUrlPathAttribute()
    {
    	return \Storage::url($this->path);
    }
}
