<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
<input type="checkbox" id="nav-toggle" />
    <div class="sidebar">
        <div class="sidebar-brand">
          <a href="#" id="img"> <img class="gambar" src="img/logo.png" alt="" width="120" height="70" /></a>
        </div>
        <div class="sidebar-menu">
          <ul>
            <li>
              <a href="{{ route('admin.index') }}" class="active"><span class="las la-igloo"></span> <span>Dashboard</span></a>
            </li>
            <li>
              <a href="{{ route('user.index') }}"><span class="las la-users"></span> <span>User</span></a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}"><span class="las la-clipboard-list"></span> <span>Kategori</span></a>
              </li>
            <li>
              <a href="{{ route('events.index') }}"><span class="las la-music"></span> <span>Event</span></a>
            </li>
            <li>
              <a href="{{ route('pemesanan.admin') }}"><span class="las la-shopping-bag"></span> <span>Pemesanan</span></a>
            </li>
            <li>
              <a href="/logout"><span class="las la-sign-out-alt"></span> <span>Logout</span></a>
            </li>
          </ul>
        </div>
      </div>

      <div class="main-content">
        <header>
          <h2>
            <label for="nav-toggle">
              <span class="las la-bars"></span>
            </label>
            Dashboard
          </h2>

          <div class="user-wrapper">
          <img src="img/2.png" width="40px" height="40px" alt="" />
            <div>
              <h4>Pregorian</h4>
              <small>Admin</small>
            </div>
          </div>
        </header>

