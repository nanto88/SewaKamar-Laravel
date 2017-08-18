@extends('layouts.master')

@section('title')
    Tambah Properti
@endsection

@section('content')
  <div class="container">
    <form action="/room" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Room</label>
        <input class="form-control" type="text" name="name" placeholder="Room">
        @if ($errors->has('name'))
          <p> {{ $errors->first('name') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Description">Description</label>
        <input class="form-control" type="textarea" name="description" placeholder="description of room">
        @if ($errors->has('description'))
          <p> {{ $errors->first('description') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Price">Price</label>
        <input class="form-control" type="number" name="price" placeholder="100000">
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
        <input class="form-control" type="text" name="city" placeholder="Depok">
        @if ($errors->has('city'))
          <p> {{ $errors->first('city') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Location">Location</label>
        <input class="form-control" type="text" name="location" placeholder="Complete Location of Address">
        @if ($errors->has('location'))
          <p> {{ $errors->first('location') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Category">Category</label>
        <select class="form-control" name="category_id">
          <option value="1">Bedroom</option>
          <option value="2">Hotel</option>
          <option value="3">Gazebo</option>
        </select>
        @if ($errors->has('category'))
          <p> {{ $errors->first('category') }} </p>
        @endif
      </div>
      <div class="form-group">
        <label for="Upload Image">Upload Image</label>
        <input class="form-control" type="file" name="image">
        <p class="help-block">File harus .jpg,.jpeg,.png dan maksimal 2mb</p>
        @if ($errors->has('image'))
          <p> {{ $errors->first('image') }} </p>
        @endif
      </div>
      <input class="btn btn-default" type="submit" name="submit" value="Create">
      {{ csrf_field() }}

    </form>
  </div>



@endsection
