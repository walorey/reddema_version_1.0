<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = "zones";

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}
