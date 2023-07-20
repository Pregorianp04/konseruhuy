@include('masyarakat.pemesanan.navbar')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card" id="data" style="width: 110rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item" id="gambar">
      <img src="{{ asset('gambarEvent/'.$events->gambar_event) }}" alt="" width="500" height="500">

    </li>
    <li class="list-group-item">
      <h3 class="text-center">{{ $events->nama_event }}</h3>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Deskripsi</a></li>
        <li><a data-toggle="tab" href="#menu1">Tiket</a></li>
      </ul>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <h3>{{ $events->deskripsi_event }}</h3>
          <br>
          <p><span class="glyphicon glyphicon-map-marker"> {{ $events->lokasi_event }}</span></p>
          <p><span class="glyphicon glyphicon-calendar"></span> {{ $events->tgl_event }}</p>
          <p>Syarat dan Ketentuan</p>
          <p>1. Entry Pass yang valid adalah yang dibeli melalui Web Resmi ReTix</p>
          <p>2. Satu Entry Pass berlaku untuk satu orang.</p>
          <p>3. Untuk mendapatkan Entry Pass, Pembeli harus dinyatakan bebas dari Covid-19.</p>
          <p>4. Panitia dan Promotor tidak bertanggung jawab/ tidak ada penggantian kerugian atas pembelian tiket acara melalui calo/tempat/kanal/platform/ yang bukan mitra resmi penjualan tiket "{{ $events->nama_event }}".</p>
          <p>5. Tiket yang hilang/dicuri tidak akan diganti atau diterbitkan ulang. Meskipun anda memiliki bukti pembelian. Tiket kalian merupakan tanggung jawab kalian.</p>
        </div>
        <div id="menu1" class="tab-pane fade">
          <form action="{{ route('pemesanan.store',$events->id_event) }}" method="POST">
            @csrf
            <table>
              <tr>
                <td>
                  <h3>Kuota</h3>
                  <h4>{{ $events->kuota_event }}</h4>
                </td>
                <td>
                    <h3>Kategori</h3>
                    <h4>{{ $events->kategori->nama_kategori }}</h4>
                  </td>
                <td>
                  <h3>Harga</h3>
                  <h4>{{ $events->harga_event }}</h4>
                </td>
                <td>


                  <div class="wrapper">
                    <span class="minus">-</span>
                    <input type="number" name="jumlah_pemesanan" class="num" value="1">
                    <span class="plus">+</span>
                  </div>
                </td>
                <td>
                    <h3>Total</h3>
                    <input type="hidden" id="totalHarga" name="total_harga" value="{{ $events->harga_event }}">
                    <h4 id="displayTotalHarga">Rp. {{ $events->harga_event }}</h4>
                  </td>
              </tr>

            </table>
            <input  type="hidden" name="id_user" value="{{old('id_user', $user->id) }}">
            <input type="hidden"  name="id_event" value="{{ old('id_event', $events->id_event) }}">

           <a href="{{ route('pemesanan.create2',$user->id) }}" ><button id="btn">Pesan</button></a>
          </form>
        </div>
      </div>
    </li>
  </ul>
</div>



<script>
    const plus = document.querySelector(".plus");
    const minus = document.querySelector(".minus");
    const num = document.querySelector(".num");
    let hargaEvent = parseFloat(document.getElementById("totalHarga").value);

    plus.addEventListener("click", () => {
        let jumlah = parseInt(num.value);
        jumlah++;
        num.value = jumlah;
        updateTotalHarga(jumlah);
    });

    minus.addEventListener("click", () => {
        let jumlah = parseInt(num.value);
        if (jumlah > 1) {
            jumlah--;
            num.value = jumlah;
            updateTotalHarga(jumlah);
        }
    });

    function updateTotalHarga(jumlah) {
        let displayTotalHarga = document.getElementById("displayTotalHarga");
        let totalHarga = document.getElementById("totalHarga");

        displayTotalHarga.innerText = "Rp. " + (hargaEvent * jumlah);
        totalHarga.value = hargaEvent * jumlah;

        // Update jumlah pemesanan di input tersembunyi
        document.getElementById("jumlah_pemesanan").value = jumlah;
    }
</script>
