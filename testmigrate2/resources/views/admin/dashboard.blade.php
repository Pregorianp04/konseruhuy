<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="admin/menu.css" />
  </head>
  <body>

  @extends('admin.menu')

<div class="main-content">
      <main>
        <div class="cards">
          <div class="card-single">
            <div>
              <h1>15</h1>
              <span>Pembeli</span>
            </div>
            <div>
              <span class="las la-users"></span>
            </div>
          </div>

          <div class="card-single">
            <div>
              <h1>17</h1>
              <span>Produk</span>
            </div>
            <div>
              <span class="las la-clipboard"></span>
            </div>
          </div>

          <div class="card-single">
            <div>
              <h1>25</h1>
              <span>Pesanan</span>
            </div>
            <div>
              <span class="las la-shopping-bag"></span>
            </div>
          </div>

          <div class="card-single">
            <div>
              <h1>Rp5JT</h1>
              <span>Saldo</span>
            </div>
            <div>
              <span class="las la-wallet"></span>
            </div>
          </div>
        </div>
      </main>
    </body>
</html>
