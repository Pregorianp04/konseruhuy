@extends('admin.layouts')
@section('content')

<a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>
<div class="card">
  <div class="card-header">Event Create</div>
  <div class="card-body">
    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <label>Nama Event</label></br>
      <input type="text" name="nama_event" id="name" class="form-control"></br>
      <label>Kategori Event</label></br>
      <select class="form-select" name="id_kategori" aria-label="Default select example">
        <option selected>Pilih Kategori</option>
        @foreach($kategoris as $kategori)
        <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
        @endforeach
      </select><br>
      <label>Tanggal Event</label></br>
      <input type="date" name="tgl_event" id="date" class="form-control"></br>
      <label for="gambar_event">Gambar Event:</label>
      <input type="file" name="gambar_event" class="form-control"></br>
      <label for="deskripsi_event">Deskripsi Event:</label>
      <textarea  type="text" name="deskripsi_event" class="form-control"> </textarea></br>
      <label>Lokasi Event</label></br>
      <input type="text" name="lokasi_event" id="lokasi" class="form-control"> </br>
      <label>Harga Event</label></br>
      <input type="text" name="harga_event" id="harga" class="form-control"> </br>
      <label>Kuota Event</label></br>
      <input type="number" name="kuota_event" id="kuota" class="form-control"> </br>

      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  </div>
</div>

@stop
