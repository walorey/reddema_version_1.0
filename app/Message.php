<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
   protected $table = "messages";

   protected $guarded = ['id'];

   public function conversation()
   {
   		return $this->belongsTo('App\Conversation');
   }

   public function sender()
   {
   		return $this->belongsTo('App\User');
   }

   public function recipient()
   {
   		return $this->belongsTo('App\User');
   }
}
