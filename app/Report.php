<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";

    protected $fillable = ['accuser_id', 'accused_id', 'ruta', 'title', 'description'];

    public function accuser()
    {
    	return $this->belongsTo('App\User');
    }

    public function accused()
    {
    	return $this->belongsTo('App\User');
    }
}
