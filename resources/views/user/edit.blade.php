@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
  <div class="container">
    <form action="/user/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username">Username :</label>
        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        @if ($errors->has('name'))
          <div class="text-danger">
            <p> {{ $errors->first('name') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="Fullname">Fullname :</label>
        <input class="form-control" type="text" name="fullname" value="{{ $user->fullname }}">
        @if ($errors->has('fullname'))
          <div class="text-danger">
            <p> {{ $errors->first('fullname') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="Phone">Phone :</label>
        <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
        @if ($errors->has('phone'))
          <div class="text-danger">
            <p> {{ $errors->first('phone') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="City">City :</label>
        <input class="form-control" type="text" name="city" value="{{ $user->city }}">
        @if ($errors->has('city'))
          <div class="text-danger">
            <p> {{ $errors->first('city') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="Birth">Birth :</label>
        <input class="form-control" type="date" name="birth" value="{{ $user->birth }}">
        @if ($errors->has('birth'))
          <div class="text-danger">
            <p> {{ $errors->first('birth') }} </p>
          </div>
        @endif
      </div>
      <div class="form-group">
        <label for="Upload Image">Upload Image :</label>
        <input class="form-control" type="file" name="image" value="{{ $user->image }}">
        <p class="help-block">File harus .jpg,.jpeg,.png dan maksimal 2mb</p>
        @if ($errors->has('image'))
          <div class="text-danger">
            <p> {{ $errors->first('image') }} </p>
          </div>
        @endif
      </div>
      <input class="btn btn-default" type="submit" name="submit" value="Save">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">

    </form>
  </div>
  <br>



@endsection
