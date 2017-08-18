@extends('layouts.master')

@section('title')
    Index
@endsection

@section('content')
  <div class="row">

      @foreach ($room as $rooms)
        <div class="col col-xs-3 col-md-2">


          <div class="thumbnail" >
            <a href="/room/{{ $rooms->id }}">
              <img class="img-thumbnail" src="{{ asset('storage/room/' . $rooms->image) }}" style="max-height: 150px" alt="Card image cap">
            </a>
            <div class="well">
              <a href="/room/{{ $rooms->id }}">
                <h4 class="title">{{ $rooms->name }}</h4>
              </a>
              <p class="text-info">{{ $rooms->description }}</p>
              <p class=""><small class="text-muted"><span class="glyphicon glyphicon-map-marker"></span> {{ $rooms->city }} ,
              <br> {{ $rooms->location }}</small></p>
            </div>
          </div>
        </div>
      @endforeach
  </div>




@endsection
