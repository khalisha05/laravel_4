@extends('layout.main')
@section('title')
    Karyawan
@endsection
@section('content')
<h2 class= "mt-3">Karyawan</h2>
    <hr>
    <div class="card">
  <div class="card-header">
  <a class="btn btn-outline-danger btn-sm" href="/insertkaryawan" role="button">Tambah Karyawan</a>
  </div>
  <div class="card-body">
  <table class="table table-primary">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Nama Karyawan</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Email</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Foto</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($karyawan as $item)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{ $item -> namakaryawan}}</td>
      <td>{{ $item -> jeniskelamin}}</td>
      <td>{{ $item -> alamat}}</td>
      <td>{{ $item -> email}}</td>
      <td>{{ $item -> jabatan -> jabatan}}</td>

      <td><img src="{{ asset('storage/images/'. $item->foto)  }}" alt=""width="75"></td>
      
      <td>
          <a class="btn btn-outline-success btn-sm" href="/editkaryawan/{{$item -> id}}" role="button">Edit</a>
      </td>
      <td>
          <a class="btn btn-outline-danger btn-sm" href="/deletekaryawan/{{$item -> id}}" role="button">Delete</a>
      </td>


    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>

@endsection
