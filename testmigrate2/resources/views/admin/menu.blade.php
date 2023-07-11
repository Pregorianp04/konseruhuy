<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="css/menu.css" />
  </head>
  <body>
    <input type="checkbox" id="nav-toggle" />
    <div class="sidebar">
      <div class="sidebar-brand">
        <a href="#"> <img class="gambar" src="GB.png" alt="" width="150" height="130" /></a>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="" class="active"><span class="las la-igloo"></span> <span>Dashboard</span></a>
          </li>
          <li>
            <a href=""><span class="las la-users"></span> <span>Pembeli</span></a>
          </li>
          <li>
            <a href=""><span class="las la-clipboard-list"></span> <span>Produk</span></a>
          </li>
          <li>
            <a href=""><span class="las la-shopping-bag"></span> <span>Pesanan</span></a>
          </li>
          <li>
            <a href=""><span class="las la-user-circle"></span> <span>User</span></a>
          </li>
          <li>
            <a href=""><span class="las la-bell"></span> <span>Notification</span></a>
          </li>
          <li>
            <a href=""><span class="las la-cog"></span> <span>Settings</span></a>
          </li>
        </ul>
      </div>
    </div>

    <header>
        <h2>
          <label for="nav-toggle">
            <span class="las la-bars"></span>
          </label>
          Dashboard
        </h2>

        <div class="search-wrapper">
          <span class="las la-search"></span>
          <input type="search" placeholder="Search" />
          <button class="button" type="submit">Search</button>
        </div>

        <div class="user-wrapper">
          <img src="1.jpeg" width="40px" height="40px" alt="" />
          <div>
            <h4>Pregorian</h4>
            <small>Admin</small>
          </div>
        </div>
      </header>

      


  </body>
</html>
