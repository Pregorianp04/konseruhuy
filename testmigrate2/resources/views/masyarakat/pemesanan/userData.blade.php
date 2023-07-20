@include('masyarakat.pemesanan.navbar')

<div class="card" id="data" style="width: 110rem;">
    <div class="card-header">
      <h4> Mohon Lengkapi Data</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('pemesanan.store2', $users->id) }}" method="POST">
            @csrf
            <input  name="id_user" value="{{old('id_user', $users->id) }}">
        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control" name="name" id="nama_lengkap" placeholder="Masukkan nama" value="{{ old('name', $users->name) }}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" value="{{ old('email',$users->email) }}">
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="text" class="form-control" name="no_ktp" id="nik" placeholder="Masukkan NIK">
        </div>
        <div class="form-group">
          <label for="nomor_telp">No Telp</label>
          <input type="tel" class="form-control" name="no_telp" id="nomor_telp" placeholder="Masukkan No Telp">
        </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-default pull-right" data-dismiss="modal">
      Pesan
      </button>
    </div>
</form>
  </div>
