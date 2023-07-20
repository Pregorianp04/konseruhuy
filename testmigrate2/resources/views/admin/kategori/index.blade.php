@include('admin.menu')

    <!-- BATAS --->
    <main>
    <h1>Kategori List</h1>
    <a href="{{ route('kategori.create') }}" ><button id="btn">Create Kategori</button></a>
    <br><br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table" id="ket">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Kategori Tiket</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id_kategori }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>


                    <td>
                        {{-- <a href="{{ route('kategori.show', $kategori->id_kategori) }}"><button id="btns">Show</button></a> --}}
                        <a href="{{ route('kategori.edit', $kategori->id_kategori) }}"><button id="btne">Edit</button></a>
                        <form action="{{ route('kategori.destroy', $kategori->id_kategori) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="btnd" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
</div>

</body>
</html>
