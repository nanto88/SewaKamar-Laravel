<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function rooms()
    {
      return $this->hasMany('App\Room');
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
                'email',
                'password',
                'fullname',
                'phone',
                'city',
                'birth',
                'image',
            ];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
