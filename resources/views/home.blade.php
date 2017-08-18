@extends('layouts.master')

@section('title')
    Beranda
@endsection

@section('content')
  <div class="slide">
    <div class="container">
      <form role="search" action="/search" autocomplete="on" method="GET">
        <div class="landing">
          <div class="row">
            <h1 class="text-center">Cari Kamar Sekarang</h1>
            <div class="col col-xs-12">
              <div class="form-group-lg">
                <label for="">City</label>
                <input name="city" type="text" class="input-lg form-control" placeholder="Search by city">
              </div>
              @if ($errors->has('city'))
                <div class="alert alert-danger">
                  <p> <strong>Whoops,</strong> {{ $errors->first('city') }} </p>
                </div>
              @endif
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col col-xs-4">
              <div class="form-group date"  data-provide="datepicker">
                <label class="control-label" for="start_date">Check-in</label>
                  <input name="start_date" type="text" class="input-lg form-control" placeholder="Check-in">
                  {{-- value="{{ date('Y-m-d') }} --}}
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                  @if ($errors->has('start_date'))
                    <div class="alert alert-danger">
                      <p> <strong>Whoops,</strong> {{ $errors->first('start_date') }} </p>
                    </div>
                  @endif
              </div>
            </div>
            <div class="col col-xs-4">
              <div class="form-group">
                <label for="name">Check-out</label>
                <input name="end_date" required type="text" class="input-lg form-control" placeholder="Check-out">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
                @if ($errors->has('end_date'))
                  <div class="alert alert-danger">
                    <p> <strong>Whoops,</strong> {{ $errors->first('end_date') }} </p>
                  </div>
                @endif
              </div>
            </div>
            <div class="col col-xs-4">
              <div class="form-group">
                <label for="name">Jumlah</label>
                <input name="person" type="number" class="input-lg form-control" placeholder="Jumlah">
                @if ($errors->has('person'))
                  <div class="alert alert-danger">
                    <p> <strong>Whoops,</strong> {{ $errors->first('person') }} </p>
                  </div>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col col-xs-12">
              <div class="form-group" align="right">
                <button type="submit" class="btn btn-lg btn-default">
                  <em class="glyphicon glyphicon-search"></em> Search
                </button>
              </div>
            </div>
          </div>
        </form>
        <!-- Form search landing -->
      </div>
    </div>
  </div>

  {{-- <div class="slide2">
    <div class="container">
      <div class="landing">
        <div class="row">
          <div class="col col-xs-4">
            <h3>
              Saya sangat puas menginap disini, cepat prosesnya dan sangat murah!
              <br>
              <strong>Riki Harun</strong>
            </h3>
          </div>
          <div class="col col-xs-4">
            <h3>
              Saya sangat puas menginap disini, cepat prosesnya dan sangat murah!
              <br>
              <strong>Riki Harun</strong>
            </h3>
          </div>
          <div class="col col-xs-4">
            <h3>
              Saya sangat puas menginap disini, cepat prosesnya dan sangat murah!
              <br>
              <strong>Riki Harun</strong>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
