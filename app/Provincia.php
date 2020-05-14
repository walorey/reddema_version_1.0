<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $fillable = ['id', 'name'];

    public function departamentos()
    {
    	return $this->hasMany('App\Departamento');
    }
}
