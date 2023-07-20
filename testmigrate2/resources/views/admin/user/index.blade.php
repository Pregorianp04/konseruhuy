@include('admin.menu')

<main>
    <h1>User List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Password</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->password }}</td>
                {{-- <td><a class="btn btn-secondary btn-sm" href="{{ route('admin.detail',$item->id) }}">Detail</a></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</main>


