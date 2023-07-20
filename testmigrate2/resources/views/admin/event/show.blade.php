@extends('admin.layouts')

@section('content')
<a href={{ route('events.index') }} class="btn btn-secondary">kembali</a><br>
    <b>ID :  </b>{{ $data->id_event }} <br>
    <b>nama : </b> {{ $data->nama_event }}<br>
    {{-- <b>gambar : </b> {{ $data->gambar_event }} --}}
    <b>tgl event: </b> {{ $data->tgl_event }}<br>
    <b>Deskripsi : </b> {{ $data->deskripsi_event }}<br>
    <b>Lokasi  </b> {{ $data->lokasi_event }}<br>
    
@endsection
