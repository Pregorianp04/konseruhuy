@extends('admin.layouts')

@section('content')
<a href={{ route('kategori.index') }} class="btn btn-secondary">kembali</a><br>
    <b>ID :  </b>{{ $data->id_kategori }} <br>
    <b>nama : </b> {{ $data->nama_kategori }}<br>
    

@endsection
