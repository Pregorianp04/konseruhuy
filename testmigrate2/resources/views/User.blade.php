<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/user.css" rel="stylesheet"/>
</head>
<body>
    @extends('aplikasi')

@section('konten')


    <table class="table">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Password</th>
                <th> Aksi </th>
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
                <td><a class="btn btn-secondary btn-sm" href="{{ route('admin.detail',$item->id) }}">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $data->links() }} --}}
@endsection
</body>
</html>
