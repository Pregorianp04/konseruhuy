@include('admin.menu')




      <main>
    <h1>Laporan Penjualan</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <td>ID Pesan</td>
                <td>Nama User</td>
                <td>Nama Event</td>
                <td>Nama Kategori</td>
                <td>Jumlah Pesan</td>
                <td> Total harga</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pemesanans as $pemesanan)
            <tr>
                <td>{{ $pemesanan->id_pemesanan }}</td>
                <td>{{ $pemesanan->user->name }}</td>
                <td>{{ $pemesanan->event->nama_event }}</td>
                <td>{{ $pemesanan->event->kategori->nama_kategori }}</td>
                <td>{{ $pemesanan->jumlah_pemesanan }}</td>
                <td>{{ $pemesanan->total_harga }}</td>
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


      </main>
    </div>
  </body>
</html>
