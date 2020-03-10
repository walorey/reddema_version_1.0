<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table = "notifications";

    public function userAddressee()
    {
    	return $this->belongsTo('App\User', 'addressee_user_id');
    }

    public function userGenerator()
    {
    	return $this->belongsTo('App\User', 'generator_user_id');
    }
}
