<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $table = 'location';
  protected $fillable = [
      'name',
      'address',
      'city'
  ];

  public function events() {
    return $this->hasMany('App\Event');
  }

}
