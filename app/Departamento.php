<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    public function provincia()
    {
    	return $this->belongsTo('App\Provincia');
    }

    public function zones()
    {
    	return $this->hasMany('App\Zone');
    }
}
