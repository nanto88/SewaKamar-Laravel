@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-xs-2">
      <ul class="nav nav-pills nav-stacked">
        <li class="well-sm"><a href="/user/{{ Auth::user()->id }}">Profile</a></li>
        <li class="well-sm"><a href="{{ Auth::user()->id }}/booking">Cek Booking</a></li>
        <li class="well-sm"><a href="{{ Auth::user()->id }}/reservation">Cek Pesanan</a></li>

      </ul>
    </div>

    <div class="col col-xs-10">
      <img src="{{ asset('storage/user/' . $user->image) }}" alt="" width="150">
      <br>
      <a href="/user/{{ Auth::user()->id }}/edit" class="btn btn-primary">Edit Profile</a>
      <h1>Halo {{ $user->name }}</h1>
      <a href="/room/create" class="btn btn-success">
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
                <a href="/room/{{ $room->id }}">
                  <img src="{{ asset('storage/room/' . $room->image) }}" alt="room image" style="height: 180px">
                  <div class="caption">
                    <h3>{{ $room->name }}</h3>
                    </a>
                    <p>{{ $room->description }}</p>
                    <p>Rp. {{ $room->price }}</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> {{ $room->city }} ,
                    <br> {{ $room->location }}</p>
                    <p>
                    <a href="/room/{{ $room->id }}/edit">
                      <button type="button" name="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-cog"></span>
                         Update Properti
                      </button>
                    </a>
                    </p>
                    <form action="/room/{{ $room->id }}" method="post">
                      <button class="btn btn-danger" type="submit" name="submit">
                        <span class="glyphicon glyphicon-trash"></span>
                         Delete Properti
                      </button>
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete">
                    </form>
                    {{-- <a href="/room/{{ $room->id }}/destroy">
                      <span class="glyphicon glyphicon-cog"></span>
                      Delete Properti
                    </a> --}}
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
  </div>




@endsection
