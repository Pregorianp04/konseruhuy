@extends('admin/layouts')
@section('content')
 
<div class="card">
  <div class="card-header">Event Create</div>
  <div class="card-body">
      
      <form action="{{ route ('events.create') }}" method="post">
        {!! csrf_field() !!}
        <label>Name Event</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Tanggal Event</label></br>
        <input type="date" name="date" id="date" class="form-control"></br>
        <label for="gambar_event">Gambar Event:</label>
        <input type="text" name="gambar_event" class="form-control"></br>
        <label for="deskripsi_event">Deskripsi Event:</label>
        <input type="text" name="deskripsi_event" class="form-control"></br>
        <label>Lokasi Event</label></br>
        <input type="text" name="lokasi" id="lokasi" class="form-control"></br>
        <label>Kouta Event</label></br>
        <input type="text" name="kouta" id="kouta" class="form-control"></br>
        <a href="{{ route ('events.index') }}"><input type="submit" value="Save" class="btn btn-success"></a></br>
    </form>
   
  </div>
</div>
 
@stop