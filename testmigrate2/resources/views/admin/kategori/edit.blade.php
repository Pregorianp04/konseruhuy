
@extends('admin/layouts')

@section('content')
    <h1>Edit Kategori</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_event', $kategori->nama_event) }}">
        </div>


       
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
