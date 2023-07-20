@include('admin.menu')

    <!-- BAATAAS LUR --->
    <main>
    <h1>Event List</h1>
    <a href="{{ route('events.create') }}"><button id="btn">Create Event</button></a>
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
                <th scope="col">ID Kategori Tiket</th>
                <th scope="col">Kategori Tiket</th>
                 <th scope="col">Deskripsi Event</th>
                 <th scope="col">Lokasi Event</th>
                 <th scope="col">Kuota Event</th>

                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id_event }}</td>
                    <td>{{ $event->nama_event }}</td>
                    <td>
                        <img src="{{ asset('gambarEvent/'.$event->gambar_event) }}" alt="" style="width:55px">
                    </td>
                    <td>{{ $event->id_kategori }}</td>
                    <td>{{ $event->kategori->nama_kategori }}</td>
                     <td>{{ $event->deskripsi_event }}</td>
                    <td>{{ $event->lokasi_event }}</td>
                    <td>{{ $event->kuota_event }}</td>

                    <td>
                        {{-- <a href="{{ route('events.show', $event->id_event) }}"><button id="btns">Show</button></a> --}}
                        <a href="{{ route('events.edit', $event->id_event) }}"><button id="btne">Edit</button></a>
                        <form action="{{ route('events.destroy', $event->id_event) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="btnd" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}

</main>
</div>
</body>
</html>
