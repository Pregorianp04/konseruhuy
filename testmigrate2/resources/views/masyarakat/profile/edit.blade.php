@include('masyarakat.pemesanan.navbar')

<div class="card" id="data" style="width: 110rem;">
    <div class="card-header">
      <h4>Edit Data</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('profile.update',$users->id )}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" name="name"class="form-control" id="nama_lengkap" placeholder="Masukkan nama" value="{{ old('name',$users->name )}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email"class="form-control" id="email" placeholder="Masukkan email" value="{{ old('email',$users->email) }}">
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="text" name="no_ktp" class="form-control" id="nik" placeholder="Masukkan NIK" value="{{ old('no_ktp',$users->no_ktp )}}">
        </div>
        <div class="form-group">
          <label for="nomor_telp">No Telp</label>
          <input type="text"  name="no_telp" class="form-control" id="nomor_telp" placeholder="Masukkan No Telp" value="{{ old('no_telp',$users->no_telp )}}">
        </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-default pull-right" data-dismiss="modal">
      Simpan
      </button>
    </form>
    </div>
  </div>
