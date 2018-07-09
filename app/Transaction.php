<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = [
        'id',
        'qty',
        'ticket_id',
        'user_id'
    ];
    public function event() {
      return $this->belongsTo('App\Event');
    }

    public function user() {
      return $this->belongsTo('App\User');
    }
}
