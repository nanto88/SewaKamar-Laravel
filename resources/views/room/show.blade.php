@extends('layouts.master')

@section('title')
    Room
@endsection

@section('content')
  {{-- {{ dd(strpos($url, '?') !== false) }} --}}
  <div class="container">
    <div class="row">
      <div class="col col-xs-6">
        <div class="thumbnail">
            <img src="{{ asset('storage/room/' . $room->image) }}" alt="room image" style="height: 380px">
        </div>
      </div>

      <div class="col col-xs-4">
          <div class="text-left">
            <div class="well">
                <h2 class="title">{{ $room->name }}</h2>
                <p>{{ $room->description }}</p>
                <p>{{$room->category->name}}</p>
                <p>Rp. {{ $room->price }}</p>
                <p>Max Person: {{ $room->person }}</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> {{ $room->city }} ,
                <br> {{ $room->location }}</p>
                <hr>
                <h3>Kontak</h3>
                <p>{{ $room->user->fullname }}</p>
                <p><span class="glyphicon glyphicon-phone"></span> {{ $room->user->phone }}</p>
                @if ($room->status == 0)
                  <a href="#">
                  <button class="btn btn-default" type="submit" name="submit">
                      <span class="glyphicon glyphicon-home"></span>
                      Tidak Tersedia
                  </button>
                  </a>
                @elseif (strpos($url, '?') !== false && Auth::user() == NULL )
                  <a href="/booking?{{ $qs }}&room_id={{ $room->id }}">
                  <button class="btn btn-default" type="submit" name="submit">
                      <span class="glyphicon glyphicon-home"></span>
                      Booking
                  </button>
                  </a>
                @elseif (strpos($url, '?') == false && Auth::user() == NULL)
                  <a href="/booking?room_id={{ $room->id }}">
                  <button class="btn btn-default" type="submit" name="submit">
                      <span class="glyphicon glyphicon-home"></span>
                      Booking
                  </button>
                  </a>
                @elseif ($room->user->id === Auth::user()->id)
                  <a href="{{ $room->id }}/edit">
                  <button class="btn btn-default" type="submit" name="submit">
                      <span class="glyphicon glyphicon-home"></span>
                      Update
                  </button>
                  </a>
                @elseif (strpos($url, '?') !== false)
                  <a href="/booking?{{ $qs }}&room_id={{ $room->id }}">
                  <button class="btn btn-default" type="submit" name="submit">
                      <span class="glyphicon glyphicon-home"></span>
                      Booking
                  </button>
                  </a>
                @else
                  <a href="/booking?room_id={{ $room->id }}">
                  <button class="btn btn-default" type="submit" name="submit">
                      <span class="glyphicon glyphicon-home"></span>
                      Booking
                  </button>
                  </a>
                @endif



          </div>
        </div>
      </div>

      <div class="col col-xs-2">
        <h5 class="title">Pemilik</h5>
        <h6><span class="glyphicon glyphicon-user"></span> {{ $room->user->name }}</h6>
        <hr>
        <h5>Status</h5>
        <h6>@if ($room->status == 1)
          <span class="glyphicon glyphicon-ok"></span> Tersedia
          @else
          <span class="glyphicon glyphicon-remove"></span> Tidak Tersedia
        @endif</h6>
      </div>

    </div>
  </div>





@endsection
