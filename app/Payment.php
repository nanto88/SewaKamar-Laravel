<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  public function room()
  {
    return $this->belongsTo('App\Room');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function reservation()
  {
    return $this->belongsTo('App\Reservation');
  }

  protected $fillable = [
    'payment_type',
    'amount',
    'user_id',
    'room_id',
    'reservation_id',
    'status'
  ];
}
