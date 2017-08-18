@extends('layouts.master')

@section('title')
    Konfirmasi Booking
@endsection

@section('content')
  <div class="container">
    <h3>Confirmation Check-in & Check-out</h3>
    @if (strpos($url, '?') == false)

      <form action="booking" method="post">
        <div class="form-group">
          <label for="name">Check In</label>
          <input class="form-control" type="text" name="start" readonly>
        </div>
        <div class="form-group">
          <label for="name">Check Out</label>
          <input class="form-control" type="text" name="end" readonly>
        </div>
        <input type="hidden" name="room_id" value="{{ $request->room_id }}">

        <div class="alert alert-info">
          check-in dan check-out harus mengisi pada saat search di halaman home
        </div>
        <a href="/home">
        <button class="btn btn-default" type="button" name="button">Back To Search</button>
        </a>

        {{ csrf_field() }}

      </form>

    @else

      <form action="booking" method="post">
        <div class="form-group">
          <label for="name">Check In</label>
          <input class="form-control" type="text" name="start" value="{{$request->start_date}}" readonly>
        </div>
        <div class="form-group">
          <label for="name">Check Out</label>
          <input class="form-control" type="text" name="end" value="{{$request->end_date}}" readonly>
        </div>
        <input type="hidden" name="room_id" value="{{ $request->room_id }}">

        <input class="btn btn-default" type="submit" name="submit" value="Continue">
        <a href="/home">
        <button class="btn btn-default" type="button" name="button">Back To Search</button>
        </a>

        {{ csrf_field() }}

      </form>

    @endif

  </div>
  <br>



@endsection
