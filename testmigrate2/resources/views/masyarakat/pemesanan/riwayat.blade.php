<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>ReTix</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
  body {
    font: 400 15px/1.8 Roboto;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }

  .nav-tabs li a {
    color: #777;
  }

  #data{
    margin-top: 100px;
    margin-left: 200px;
    margin-bottom: -70px;
    background-color: #b4b2b2;
  }
  #lg{
    margin-top: -13px;
  }
  #menu1{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
  }
  .wrapper{
    height: 50px;
    min-width: 180px;
    border-radius: 12px;
    align-items: center;
    justify-content: center;
    display: flex;
    border:#000;
  }
  .wrapper span{
    width: 100%;
    text-align: center;
    font-size: 30px;
    font-weight: 100;
    cursor: pointer;
  }
  .wrapper span num{
    font-size: 30px;
    border-right: 2px solid rgba(0, 0, 0, 2);
    border-left: 2px solid rgba(0, 0, 0, 2);
    pointer-events: none;
  }
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #004;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .card{
    background-color: #777;
  }
  #btn{
    margin-top: 100px;
    margin-left: 200px;
    margin-bottom: -80px;
  }
  #img{
    margin-top: -15px;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #004 !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }

</style>
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
        <li><a href={{ route('masyarakat.index') }}>HOME</a></li>
        <li><a href="#band">ABOUT</a></li>
        <li><a href="#tour">TIKET</a></li>
        <li><a href={{ route('pemesanan.riwayat') }}><span id="lg" class="glyphicon glyphicon-shopping-cart btn-lg"></span></a></li>
        <li><a href={{ route('login') }}><span id="lg" class="glyphicon glyphicon-log-out btn-lg"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
        {{-- <li><a href="#">LOGOUT</a></li> --}}
        <!--<li><a href="#"></a><span id="cl" class="glyphicon glyphicon-user"></span></li>-->
      </ul>
    </div>
  </div>
</nav>
<a href={{ route('masyarakat.index') }}><button type="button" id="btn" class="btn btn-info">Kembali</button></a>


<div class="card " id="data">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong> <span class="glyphicon glyphicon-list-alt"></span>  Riwayat Pemesanan</strong></li>
    <li class="list-group-item">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama Event</th>
                <th>Nama Kategori</th>
                <th>Jumlah Pesan</th>
                <th>Harga</th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pemesananUser as $pemesanan)
                <tr>
                  <td> {{ $pemesanan->event->nama_event }}</td>
                  <td> {{ $pemesanan->event->kategori->nama_kategori }}</td>
                  <td>{{ $pemesanan->jumlah_pemesanan }}</td>
                  <td>{{ $pemesanan->event->harga_event }}</td>
                  <td>{{ $pemesanan->total_harga }}</td>

                </tr>
                @endforeach
              </tbody>
          </table>
    </li>
  </ul>
</div>




</body>
</html>
