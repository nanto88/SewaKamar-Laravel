@extends('layouts.master')

@section('title')
    Update Properti
@endsection

@section('content')
  <div class="container">
    <form action="/room/{{ $room->id }}" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Room</label>
        <input class="form-control" type="text" name="name" value="{{ $room->name }}">
        @if ($errors->has('name'))
          <p> {{ $errors->first('name') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Description">Description</label>
        <input class="form-control" type="textarea" name="description" value="{{ $room->description }}">
        @if ($errors->has('description'))
          <p> {{ $errors->first('description') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Price">Price</label>
        <input class="form-control" type="number" name="price" value="{{ $room->price }}">
        @if ($errors->has('price'))
          <p> {{ $errors->first('price') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Price">Max Person</label>
        <select class="form-control" name="person">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        @if ($errors->has('person'))
          <p> {{ $errors->first('person') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Price">Status</label>
        <select class="form-control" name="status">
          <option value="1">Room is ready</option>
          <option value="0">Room is not ready</option>
        </select>
        @if ($errors->has('status'))
          <p> {{ $errors->first('status') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="City">City</label>
        <input class="form-control" type="text" name="city" value="{{ $room->city }}">
        @if ($errors->has('city'))
          <p> {{ $errors->first('city') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Location">Location</label>
        <input class="form-control" type="text" name="location" value="{{ $room->location }}">
        @if ($errors->has('location'))
          <p> {{ $errors->first('location') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Category">Category</label>
        <select class="form-control" name="category_id">
          <option value="1">Kamar Pribadi</option>
          <option value="2">Kamar Kos</option>
          <option value="3">Kamar Apartemen</option>
        </select>
        @if ($errors->has('category'))
          <p> {{ $errors->first('category') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Upload Image">Upload Image</label>
        <br>
        <img src="{{ asset('storage/room/' . $room->image ) }}" alt="room image" style="height: 180px" class="thumbnail">
        <input class="form-control" type="file" name="image">
        <p class="help-block">File harus .jpg,.jpeg,.png dan maksimal 2mb</p>
        {{-- @if ($errors->has('image'))
          <p> {{ $errors->first('image') }} </p>
        @endif --}}
      </div>
      <input class="btn btn-default" type="submit" name="submit" value="Edit">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">

    </form>
  </div>
  <br>



@endsection
