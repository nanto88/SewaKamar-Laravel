@extends('layouts.master')

@section('title')
    Booking
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col col-xs-2">
      <ul class="nav nav-pills nav-stacked">
        <li class="well-sm"><a href="/user/{{ Auth::user()->id }}">Profile</a></li>
        <li class="well-sm"><a href="booking">Cek Booking</a></li>
        <li class="well-sm"><a href="reservation">Cek Pesanan</a></li>

      </ul>
    </div>

    <div class="col col-xs-10">
      <img src="{{ asset('storage/user/' . $user->image) }}" alt="" width="150">
      <h1>Halo {{ $user->name }}</h1>

      <div class="panel panel-default">
      <!-- Default panel contents -->
        <div class="panel-heading"><h3>Daftar Booking</h3></div>
        <div class="panel-body">

    @if ($user->reservations()->count() == null)

          <p>No Data Available</p>

{{-- div panel --}}
        </div>
      </div>



    @else
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Room</th>
                <th>Price</th>
                <th>Total</th>
                <th>Owner</th>
                <th>Contact</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{ dd($room) }} --}}

            @foreach ($user->reservations as $reservation)
                  <tr>
                  <td> {{ $reservation->start_date }} </td>
                  <td> {{ $reservation->end_date }} </td>
                  <td>
                    <a href="/room/{{ $reservation->room_id }}">
                      {{ $reservation->room->name }}
                    </a>
                  </td>
                  <td> Rp. {{ $reservation->room->price }} </td>
                  <td>
                    <?php
                      $start     = date_create($reservation->start_date);
                      $end       = date_create($reservation->end_date);
                      $interval  = $start->diff($end)->format('%a');
                      $total    = ($interval * $reservation->room->price);
                     ?>
                    Rp. {{ $total }}
                  </td>
                  <td>
                    {{-- {{ dd($reservation->room->user) }} --}}
                    @if ( $reservation->room->user->fullname == null )
                        {{ $reservation->room->user->name }}
                    @else
                        {{ $reservation->room->user->fullname }}
                    @endif
                  </td>
                  <td> {{ $reservation->room->user->phone }} </td>
                  <td>
                    @if ($reservation->status == 0)
                      <span class="glyphicon glyphicon-hourglass"></span>
                      Menunggu Konfirmasi
                    @elseif ($reservation->status == 1)
                      <span class="glyphicon glyphicon-ok"></span>
                      Diterima
                    @elseif ($reservation->status == 2)
                      <span class="glyphicon glyphicon-remove"></span>
                      Tidak Diterima
                    @endif
                  </td>
                </tr>
            @endforeach


            </tbody>
          </table>
          <div class="panel panel-footer">
              Segera kontak owner jika booking diterima
          </div>
        </div>


      </div>

    </div>

    @endif

          {{-- Div panel --}}


    </div>




@endsection
