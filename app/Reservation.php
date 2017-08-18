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

  public function payment()
  {
    return $this->hasOne('App\Payment');
  }

  protected $fillable = [
    'start_date',
    'end_date',
    'user_id',
    'room_id',
    'status',
    'created_at',
    'updated_at'
  ];
}
