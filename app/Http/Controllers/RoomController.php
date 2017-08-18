<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $rooms)
    {

        $all = Room::all();
        // dd($all);
        return view('room.index', [
          'room' => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::find($id);
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name'        => 'required',
          'description' => 'required|max:200',
          'city'        => 'required|max:20',
          'location'    => 'required|max:50',
          'status'       => 'required',
          'person'      => 'required|max:2',
          'image'       => 'mimes:jpeg,jpg,png|max:2000|required',
          'price'       => 'required|max:7'
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalName().'.'.$request->image->getClientOriginalExtension();
        $request->file('image')->storeAs('public/room', $imageName);

        $room = new Room([
                    'name' => $request->name,
                    'description' => $request->description,
                    'city' => $request->city,
                    'location' => $request->location,
                    'price' => $request->price,
                    'person' => $request->person,
                    'status' => $request->status,
                    'category_id' => $request->category_id,
                    'image' => $imageName,
                    'user_id' => Auth::user()->id
                  ]);

        // $user = User::find($id);
        $room->save();

        return redirect('user/' . Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // dd($room->user->name);
        $room = Room::find($id);
        $user = User::whereHas('rooms', function ($query) use($room) {
        $query->where('user_id', '=', $room->user_id);
        })->get();

        $url = $request->fullUrl();
        // dd(strpos($url, '?'));
        if (strpos($url, '?') !== false) {
          $qs = $request->fullUrl();
          $qs = explode('?', $qs);
          $qs = $qs[1];
          // dd(count('?') > 0);

          return view('room.show', [
          'room' => $room,
          'qs' => $qs,
          'url' => $url
        ]);
        }
        else {
            return view('room.show', [
            'room' => $room,
            'user' => $user,
            'url' => $url
          ]);
          }


        // $qs = $qs . '?room_id=' . $id;



      // >appends(Request::capture()->except('page'))->render()
    }


    public function edit($id)
    {
      return view('room.edit', [
        'room' => Room::find($id)
    ]);
    }

    public function update(Request $request, $id)
    {

      $room = Room::findOrFail($id);
      // dd($request);
      if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->getClientOriginalName().'.'.$request->image->getClientOriginalExtension();
        $request->file('image')->storeAs('public/room', $imageName);

        $room->update([
          'image' => $imageName
        ]);

      }

       $room->update([
        'name' => $request->name,
        'description' => $request->description,
        'city' => $request->city,
        'location' => $request->location,
        'price' => $request->price,
        'person' => $request->person,
        'status' => $request->status,
        'category_id' => $request->category_id,
      ]);

      return redirect('user/' . Auth::user()->id);
    }


    public function destroy($id)
    {
        $room = Room::find($id);
        dd($room);
        $room->delete();
        return redirect('user/' . Auth::user()->id);
    }
}
