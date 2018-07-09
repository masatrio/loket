<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
      protected $table = 'ticket';
      protected $fillable = [
          'id',
          'price',
          'quota',
          'type',
          'event_id'
      ];
      public function event() {
        return $this->belongsTo('App\Event');
      }
}
