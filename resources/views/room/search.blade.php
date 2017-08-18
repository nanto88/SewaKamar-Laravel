@extends('layouts.master')

@section('title')
    Pencarian
@endsection

@section('content')
  <div class="container">
    <div class="row">
      @if ($room == null)
        <div class="alert alert-info">
          <p><strong>Whoops..</strong> No Rooms Available</p>
        </div>
      @endif
        @foreach ($room as $rooms)
          <div class="col col-md-3 col-xs-3">

            <div class="thumbnail">
                <img class="img-thumbnail" src="{{ asset('storage/room/' . $rooms->image) }}" style="max-height: 150px" alt="Card image cap">
              <div class="well">

                <a href="/room/{{ $rooms->id }}?{{ $qs }}">
                  <h4>{{ $rooms->name }}</h4>
                </a>
                <p class="text-info">{{ $rooms->description }}</p>
                <p class="text-info">Rp. {{ $rooms->price }}</p>
                <p class=""><small class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> {{ $rooms->city }} ,
                <br> {{ $rooms->location }}</small></p>
              </div>
            </div>
          </div>
        @endforeach
    </div>
  </div>




@endsection
