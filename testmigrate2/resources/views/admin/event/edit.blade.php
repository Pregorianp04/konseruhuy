
@extends('layouts.app')

@section('content')
    <h1>Edit Event</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('events.update', $event->id_event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_event">Nama Event:</label>
            <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event', $event->nama_event) }}">
        </div>
        <div class="form-group">
            <label for="tgl_event">Tanggal Event:</label>
            <input type="date" name="tgl_event" class="form-control" value="{{ old('tgl_event', $event->tgl_event) }}">
        </div>
        <div class="form-group">
            <label for="gambar_event">Gambar Event:</label>
            <input type="text" name="gambar_event" class="form-control" value="{{ old('gambar_event', $event->gambar_event) }}">
        </div>
        <div class="form-group">
            <label for="deskripsi_event">Deskripsi Event:</label>
            <input type="text" name="deskripsi_event" class="form-control" value="{{ old('deskripsi_event', $event->deskripsi_event) }}">
        </div>
        <div class="form-group">
            <label for="lokasi_event">Lokasi Event:</label>
            <input type="text" name="lokasi_event" class="form-control" value="{{ old('lokasi_event', $event->lokasi_event) }}">
        </div>
        <div class="form-group">
            <label for="kuota_event">Kuota Event:</label>
            <input type="number" name="kuota_event" class="form-control" value="{{ old('kuota_event', $event->kuota_event) }}">
        </div>
        <div class="form-group">
            <label for="eli">Eli:</label>
            <input type="text" name="eli" class="form-control" value="{{ old('eli', $event->eli) }}">
        </div>
        <div class="form-group">
            <label for="identifier">Identifier:</label>
            <```html
            <input type="number" name="identifier" class="form-control" value="{{ old('identifier', $event->identifier) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
