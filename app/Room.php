<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Room extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  // public function users()
  // {
  //   return $this->belongsToMany('App\User', 'reservations', 'user_id', 'room_id')
  //               ->withPivot('start_date', 'end_date', 'created_at', 'updated_at')
  //   ;
  // }

  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function reservations()
  {
    return $this->hasMany('App\Reservation');
  }

  public function payments()
  {
    return $this->hasMany('App\Payment');
  }

  protected $fillable = [
    'name',
    'description',
    'city',
    'location',
    'price',
    'person',
    'status',
    'category_id',
    'image',
    'user_id'
  ];
}
