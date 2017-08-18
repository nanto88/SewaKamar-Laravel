<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;
use App\User;
use App\Reservation;
use Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
      $url = $request->fullUrl();
      return view('booking.create', ['request' => $request, 'url' => $url]);
    }

    public function store(Request $request)
    {

      $reservation = new Reservation([
                  'start_date' => $request->start,
                  'end_date'   => $request->end,
                  'user_id'    => Auth::user()->id,
                  'room_id'    => $request->room_id
                ]);

      // $user = User::find($id);
      $reservation->save();


      return redirect('user/' . Auth::user()->id . '/booking');
    }

    public function show($id)
    {
      $user = User::find($id);
      // $room = Room::find(2);
      // dd($user->rooms);
      return view( 'booking.show', [ 'user' => $user ] );
    }

    public function payment(Request $request)
    {
      return view('booking.payment');
    }
}
