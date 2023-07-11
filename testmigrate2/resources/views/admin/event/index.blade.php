
@extends('admin/layouts')

@section('content')
    <h1>Event List</h1>
    <a href="{{ url('/event/create') }}" class="btn btn-primary">Create Event</a>
    <br><br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Event</th>
                <th scope="col">Gambar Event</th>
                <th scope="col">Tanggal Event</th>
                <th scope="col">Deskripsi Event</th>
                <th scope="col">Lokasi Event</th>
                <th scope="col">Kuota Event</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($event as $event)
                <tr>
                    <td>{{ $event->id_event }}</td>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->gambar_event }}</td>
                    <td>{{ $event->tgl_event }}</td>
                    <td>{{ $event->deskripsi_event }}</td>
                    <td>{{ $event->lokasi_event }}</td>
                    <td>{{ $event->kuota_event }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id_event) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('events.edit', $event->id_event) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('events.destroy', $event->id_event) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
