<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>ReTix</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/landing.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">



<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="img"><img src="img/logo.png" alt="" width="100" height="50"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('masyarakat.index') }}">HOME</a></li>
        <li><a href="#band">ABOUT</a></li>
        <li><a href="#tour">TIKET</a></li>
        <li><a href={{ route('pemesanan.riwayat') }}><span id="lg" class="glyphicon glyphicon-shopping-cart btn-lg"></span></a></li>
        <li><a href={{ route('login') }}><span id="lg" class="glyphicon glyphicon-log-out btn-lg"></span></a></li>
       }

        <!-- Logo User -->
        <li><a href={{ route('profile.index') }}><span class="glyphicon glyphicon-user"></span></a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div id="myCarousel" class="carousel slide" data-ride="carousel">




    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/slider1.png" alt="New York" width="1200" height="700">
      </div>

      <div class="item">
        <img src="img/slider2.png" alt="Chicago" width="1200" height="700">
      </div>

      <div class="item">
        <img src="img/slider3.jpg" alt="Los Angeles" width="1200" height="700">
      </div>
    </div>



    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>RETIX</h3>
  <p><em>We love music!</em></p>
  <p>"Retix" adalah aplikasi tiket yang inovatif dan praktis, dirancang untuk memberikan pengguna pengalaman yang mulus dalam memesan tiket acara dan pertunjukan secara online. Dengan fitur-fitur canggih dan antarmuka yang ramah pengguna, "Retix" memberikan solusi terbaik bagi pengguna yang ingin menjelajahi dan menikmati berbagai acara dalam waktu singkat.</p>
  <br>
  </div>


<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">Tiket</h3>

    <div class="row text-center">
        @foreach ($events as $event)
      <div class="col-sm-4">
        <div class="thumbnail">

        <img src="{{ asset('gambarEvent/'.$event->gambar_event) }}" alt="" width="400" height="300">
        <p><strong>{{ $event->nama_event }}</strong></p>
        <p><strong>{{ $event->kategori->nama_kategori }}</strong></p>
        <p>{{ $event->tgl_event }}</p>
        <h3 id="harga"><strong>Rp. {{ $event->harga_event }}</strong></h3>



          <a href="{{ route('pemesanan.create',$event->id_event) }}"><button class="btn" data-toggle="modal" data-target="#myModal">Buy Tickets</button></a>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</div>


<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p> <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">www.Retix.com</a></p>
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
