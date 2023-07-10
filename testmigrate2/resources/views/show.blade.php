@extends('aplikasi')

@section('konten')
    <div>
        <a href="/User" class="btn btn-secondary">kembali</a>
        <h1> {{ $data->name }}</h1>
        <p>

            <b>ID </b>{{ $data->id }}

        </p>
        <p>
            <b>Username</b>{{ $data->email}}
        </p>
    </div>


@endsection
