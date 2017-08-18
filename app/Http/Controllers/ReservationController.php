<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;

class ReservationController extends Controller
{

    public function search(Request $request)
    {

      $this->validate($request, [
        'person' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
      ]);

      $room = DB::select('
                            SELECT
                      *
                      FROM
                      rooms
                      WHERE
                      id NOT IN (
                           SELECT
                               rooms.id
                           FROM
                               rooms
                           LEFT OUTER JOIN
                               reservations ON reservations.room_id = rooms.id
                           WHERE
                          :start_date BETWEEN reservations.start_date AND reservations.end_date
                          AND
                          :end_date BETWEEN reservations.start_date AND reservations.end_date
                         )
                      AND
                      city LIKE :city
                      AND
                      person >= :person
                      ORDER BY
                      rooms.updated_at
                      asc',
                       ['start_date' => $request->start_date,
                       'end_date' => $request->end_date,
                       'city' => "%$request->city%",
                       'person' => $request->person
                     ]
      );

      $allroom = DB::select('
              SELECT * FROM rooms
      ');
      // dd($room);
      // dd(request()->fullUrlWithQuery(["sort"=>"desc"]));
      // dd($request->query());
      $qs = $request->fullUrl();
      $qs = explode('?', $qs);
      $qs = $qs[1];

      return view('room.search', ['room' => $room, 'qs' => $qs, 'allroom' => $allroom]);
    }

    public function RoomSearch(Request $request, $id, $city, $start_date, $end_date, $person)
    {
      // $data = array(
      //   'city' => $request->city,
      //   'start_date' => $request->start_date,
      //   'end_date' => $request->end_date,
      //   'person' => $request->person,
      // );
      return view('room.show');
    }

    public function show($id)
    {

      $user = User::findOrFail($id);


      $reservations = Reservation::whereHas('room', function ($query) use($id) {
      $query->where('user_id', '=', $id);
      })->get();


      return view('reservation.show', [
        'reservations' => $reservations,
        'user' => $user
        // 'room' => $room
      ]);
    }

    public function confirmation($id, Request $request)
    {

                // akhirnya ini berhasilll gannnnn yeaayyyyyyyyy
                foreach ($request->status as $key => $data ) {

                       $input = [
                           'status' => $data,
                       ];
                       DB::table('reservations')->where('id',$key)->update($input);
                }

                
      return redirect('user/' . Auth::user()->id . '/reservation');
    }

}
