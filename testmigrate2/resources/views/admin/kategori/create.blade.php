@extends('admin/layouts')
@section('content')

<a href={{ route('events.index') }} class="btn btn-secondary">kembali</a>
<div class="card">
  <div class="card-header">Event Create</div>
  <div class="card-body">



      <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name Event</label></br>
        <input type="text" name="nama_kategori" id="name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>

    </form>

  </div>
</div>

@stop
