<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrapv4.css') }}" type="text/css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/customstyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" type="text/css">
  </head>
  <body>
    <!-- <img src="images/bg.jpg" alt="landing" class="imglanding"> -->
    <!-- percobaan image landing -->


    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">SewaKamar</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            {{-- navigasi login dan register --}}
            @if (Auth::guest())
                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="{{ asset('/storage/user/' . Auth::user()->image ) }}" alt="image" class="img-circle" style="height:25px; width:25px">
                         {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="/user/{{ Auth::user()->id }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
            @endif

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

      @yield('content')


    <footer>
      <div class="container">
        {{-- <div class="row">
          <div class="col col-sm-4">
            <ul>
              <li class="title-footer">Services</li>
              <li><a href="#">Terms Of Service</a></li>
            </ul>
          </div>
          <div class="col col-sm-4">
            <ul>
              <li class="title-footer">Resources</li>
              <li><a href="#">Help</a></li>
              <li><a href="/about">About</a></li>
            </ul>
          </div>
          <div class="col col-sm-4">
            <ul>
              <li class="title-footer">Social</li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Youtube</a></li>
            </ul>
          </div>
          <br>
          </div>
          <br> --}}
          {{-- <div class="border-footer"> --}}
          <div class="row">

              <div class="col col-xs-6">
                <p> &copy; Sewa Kamar 2017 </p>
              </div>
              <div class="col col-xs-6">
                <p style="float: right">
                  [ ] with
                  <span class="glyphicon glyphicon-heart" style="color: rgb(153, 10, 10)"></span>
                   for Indonesia
                </p>
              </div>
            </div>

          </div>
        </div>
    </footer>




    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/moment.js') }}"></script>
    <script>
        $(document).ready(function(){
            var start_date_input=$('input[name="start_date"]'); //date input
            var end_date_input=$('input[name="end_date"]'); //date input
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var date = new Date();
            start_date_input.datepicker({
                format: 'yyyy-mm-dd',
                startDate: date,
                container: container,
                todayHighlight: true,
                autoclose: true,
                })
            end_date_input.datepicker({
                format: 'yyyy-mm-dd',
                startDate: date,
                container: container,
                todayHighlight: true,
                autoclose: true,
                })

              })
    </script>
    </script>
    </body>
    </html>
