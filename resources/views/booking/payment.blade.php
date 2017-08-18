@extends('layouts.master')

@section('title')
    Booking
@endsection

@section('content')
  <div class="container">

      <form action="booking/payment" method="post">
        <div class="form-group date" data-provide="datepicker">
          <label for="name">Check In</label>
          <input class="form-control" type="text" name="start_date">
          @if ($errors->has('start_date'))
            <p> {{ $errors->first('start_date') }} </p>
          @endif
        </div>
        <div class="form-group date" data-provide="datepicker">
          <label for="name">Check Out</label>
          <input class="form-control" type="text" name="end_date">
          @if ($errors->has('start_date'))
            <p> {{ $errors->first('start_date') }} </p>
          @endif
        </div>
        <input type="hidden" name="room_id" value="{{ $request->room_id }}">

        <input class="btn btn-default" type="submit" name="submit" value="Apply">
        {{ csrf_field() }}

      </form>



  </div>



@endsection
