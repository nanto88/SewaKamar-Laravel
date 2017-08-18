@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-xs-2">
        <ul>
          <li><a href="/users/{{ Auth::user()->id }}/edit">Edit Profile</a></li>
          <li><a href="/users/{{ Auth::user()->id }}/rooms">Daftar Properti</a></li>

        </ul>
      </div>

      <div class="col col-xs-10">
        <a href="/users/{{ Auth::user()->id }}/rooms/create" class="btn btn-success">
          <span class="glyphicon glyphicon-plus"></span> Tambah Properti</a>

        <div class="panel panel-default">
        <!-- Default panel contents -->
          <div class="panel-heading"><h3>Daftar Properti</h3></div>
          <div class="panel-body">

@if ($user->rooms()->count() === null)

        <p>No Data Available</p>


@else
        <div class="row">
        @foreach ($user->rooms as $room)
          <div class="col col-xs-6 col-md-4">
            <div class="thumbnail">
              <a href="users/{{ Auth::user()->id }}/rooms/{{ $room->id }}">
                <img src="{{ asset('storage/room/' . $room->image) }}" alt="room image" style="height: 180px">
                <div class="caption">
                  <h3>{{ $room->name }}</h3>
                  </a>
                  <p>{{ $room->description }}</p>
                  <p>{{ $room->price }}</p>
                  <p>{{ $room->city }}</p>
                  <p>{{ $room->location }}</p>
                  <a href="rooms/{{ $room->id }}/edit">
                    <span class="glyphicon glyphicon-cog"></span>
                    Update Properti
                  </a>
                  <a href="users/{{ Auth::user()->id }}/rooms/{{ $room->id }}">
                    <span class="glyphicon glyphicon-cog"></span>
                    Delete Properti
                  </a>
                </div>

            </div>

          </div>
        @endforeach
        </div>

@endif

            {{-- Div panel --}}
            </div>
          </div>


        </div>
      {{-- Div container dan row --}}
      </div>
    </div>





@endsection
