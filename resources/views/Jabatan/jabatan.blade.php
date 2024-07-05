@extends('layout.main')
@section('title')
    Jabatan
@endsection
@section('content')
<h2 class= "mt-3">Jabatan</h2>
    <hr>
    <div class="card">
  <div class="card-header">
  <a class="btn btn-outline-danger btn-sm" href="/insertjabatan" role="button">Tambah Jabatan</a>
  </div>
  <div class="card-body">
  <table class="table table-primary">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Status</th>
      <th scope="col">Gaji</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($jabatan as $item)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{ $item -> jabatan}}</td>
      <td>{{ $item -> status}}</td>
      <td>{{ $item -> gaji}}</td>
      <td>
          <a class="btn btn-outline-success btn-sm" href="/editjabatan/{{$item -> id}}" role="button">Edit</a>
      </td>
      <td>
          <a class="btn btn-outline-danger btn-sm" href="/deletejabatan/{{$item -> id}}" role="button">Delete</a>
      </td>


    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>

@endsection
