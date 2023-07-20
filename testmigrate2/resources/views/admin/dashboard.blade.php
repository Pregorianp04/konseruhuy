@include('admin.menu')

<main>
    <div class="cards">
        <div class="card-single">
            <div>
                <h1>{{ $totalUser }}</h1>
                <span>User</span>
            </div>
            <div>
                <span class="las la-users"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h1>{{ $totalEvent }}</h1>
                <span>Event</span>
            </div>
            <div>
                <span class="las la-clipboard"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h1>{{ $totalKategori }}</h1>
                <span>Kategori</span>
            </div>
            <div>
                <span class="las la-clipboard"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h1>{{ $totalPemesanan }}</h1>
                <span>Pemesanan</span>
            </div>
            <div>
                <span class="las la-shopping-bag"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h1>Rp {{ number_format($totalHargaPemesanan, 0, ',', '.') }}</h1>
                <span>Pemasukan</span>
            </div>
            <div>
                <span class="las la-wallet"></span>
            </div>
        </div>
    </div>
</main>
