@extends('admin/layouts')
@section('content')

<a href={{ route('events.index') }} class="btn btn-secondary">kembali</a>
<div class="card">
  <div class="card-header">Event Create</div>
  <div class="card-body">



      <form action="{{ route('events.store') }}" method="post">
        {!! csrf_field() !!}
        <label>Name Event</label></br>
        <input type="text" name="nama_event" id="name" class="form-control"></br>
        <label>Tanggal Event</label></br>
        <input type="date" name="tgl_event" id="date" class="form-control"></br>
        <label for="gambar_event">Gambar Event:</label>
        <input type="text" name="gambar_event" class="form-control"></br>
        <label for="deskripsi_event">Deskripsi Event:</label>
        <textarea  type="text" name="deskripsi_event" class="form-control"> </textarea></br>
        <label>Lokasi Event</label></br>
        <input type="text" name="lokasi_event" id="lokasi" class="form-control"> </br>
        <label>Kouta Event</label></br>
        <input type="number" name="kuota_event" id="kuota" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>

    </form>

  </div>
</div>

@stop
