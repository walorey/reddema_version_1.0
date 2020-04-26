<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conversation extends Model
{


	protected $table = "conversations";


    public function messages()
    {
        return $this->hasMany('App\messages');
    }

    public function remitente()
    {
        return $this->belongsTo('App\User');
    }

    public function destinatario()
    {
        return $this->belongsTo('App\User');
    }
}
