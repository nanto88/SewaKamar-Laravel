<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
      return view('user.profile', ['user' => User::findOrFail($id)]);

    }

    public function edit($id, User $user)
    {
      $user = User::findOrFail($id);

      return view('user/edit' , ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'image' => 'mimes:jpeg,jpg,png|max:2000'
      ]);

      $user = User::findOrFail($id);

      if ($request->hasFile('image')) {

        $imageName = $user->id.'.'.$request->image->getClientOriginalName();
        $request->file('image')->storeAs('public/user', $imageName);

        $user->update([
          'image' => $imageName
        ]);


        // if ($user->image === null) {
        //   $user->image->update($imageName);
        // }

      }

      $user->update([
          'name'      => $request->name,
          'fullname'  => $request->fullname,
          'phone'     => $request->phone,
          'city'      => $request->city,
          'birth'     => $request->birth
      ]);
          return view('user.profile', ['user' => User::findOrFail($id)]);
      }




// Ini Work tapi mass asignment
      // $user = User::with('profile')->findOrFail($id);
      // if ($user->profile === null)
      // {
      //     $profile = new Profile([
      //                   'name' => 'test'
      //                 ]);
      //     $user->profiles()->save($profile);
      // }
      // else
      // {
      //     $user->profile->update(['name' => 'testt']);
      // }


}
