<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table = 'event';
  protected $fillable = [
      'name',
      'type',
      'date_start',
      'date_end',
      'location_id'
  ];

  public function location() {
    return $this->belongsTo('App\Location');
  }

  public function tickets() {
    return $this->hasMany('App\Ticket');
  }
}
