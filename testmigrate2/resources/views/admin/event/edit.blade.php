@extends('admin.layouts')

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
        </div> <br>
        <label for="kategori_event">Edit Kategori :</label>
        <select class="form-select" name="id_kategori" aria-label="Default select example">

            <option selected>Kategori Event</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select><br>

        <div class="form-group">
            <label for="tgl_event">Tanggal Event:</label>
            <input type="date" name="tgl_event" class="form-control" value="{{ old('tgl_event', $event->tgl_event) }}">
        </div><br>

        <div class="form-group">
            <label for="gambar_event">Gambar Event:</label>
            <img src="{{ asset('gambarEvent/' . $event->gambar_event) }}" alt="" style="width:55px">
            <input type="file" name="gambar_event" class="form-control"
                value="{{ old('gambar_event', $event->gambar_event) }}">
        </div><br>
        <div class="form-group">
            <label for="deskripsi_event">Deskripsi Event:</label>
            <input type="text" name="deskripsi_event" class="form-control"
                value="{{ old('deskripsi_event', $event->deskripsi_event) }}">
        </div><br>
        <div class="form-group">
            <label for="lokasi_event">Lokasi Event:</label>
            <input type="text" name="lokasi_event" class="form-control"
                value="{{ old('lokasi_event', $event->lokasi_event) }}">
        </div><br>
        <div class="form-group">
            <label for="harga_event">Harga Event:</label>
            <input type="number" name="harga_event" class="form-control"
                value="{{ old('harga_event', $event->harga_event) }}">
        </div><br>
        <div class="form-group">
            <label for="kuota_event">Kuota Event:</label>
            <input type="number" name="kuota_event" class="form-control"
                value="{{ old('kuota_event', $event->kuota_event) }}">
        </div><br>


        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
