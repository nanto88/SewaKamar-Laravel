@extends('layouts.master')

@section('title')
    About
@endsection

@section('content')
  <div class="container">
    <h1 style="border-bottom: 1px solid rgba(149, 149, 149, 0.5); padding-bottom: 5px;">About Us</h1>
    <p>
      Website Sewakamar merupakan salah satu website booking online yang dibuat oleh mahasiswa gunadarma.
      Seperti halnya situs layanan booking online menyediakan fasilitas booking online dari
      konsumen ke konsumen. Siapa pun dapat menyewakan properti di Sewakamar
      dan melayani pembeli dari seluruh Indonesia untuk penyewaan properti.
    </p>
    <br>
    <div class="row">
      <div class="col col-xs-6">
        <div class="text-right">
          <h3>Location</h3>
          <p class="text-muted">
            <span class="glyphicon glyphicon-map-marker"></span>
            Jl. Margonda Raya No.100, Pd. Cina, <br>
            Beji, Kota Depok, Jawa Barat 16424, <br>
            Indonesia
          </p>
          <h3>Contact Us</h3>
          <p><span class="glyphicon glyphicon-earphone"></span> +62 21 78881112</p>
        </div>

      </div>
      <div class="col col-xs-6">
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:400px;width:500px;'><div id='gmap_canvas' style='height:400px;width:500px;'></div><div><small><a href="http://embedgooglemaps.com">Click here to generate your map!</a></small></div><div><small><a href="http://mrdiscountcode.hk/ctrip/">Save Big with these Ctrip promocodes. Visit this link now!</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(-6.3683469,106.83320030000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-6.3683469,106.83320030000004)});infowindow = new google.maps.InfoWindow({content:'<strong>Website Sewakamar Beta 1.0</strong><br>Gunadarma University<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>
    </div>
    <br>
  </div>



@endsection
