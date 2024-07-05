@extends('layout.main')
@section('title')
    Insert Karyawan
@endsection
@section('content')
<h2 class= "mt-3">Insert Karyawan</h2>
    <hr>
    <div class="card">
  <div class="card-header">
        Formulir Tambahan Karyawan
  </div>
  <div class="card-body">
        <form action="/savekaryawan" method = "post" enctype= "multipart/form-data">
            @csrf
            <div class = "col-md-12">
                <label for="nama_karyawan" class = "form-label">Nama Karyawan</label>
                <input type="text" class = "form-control" name="nama_karyawan" id = "nama_karyawan">
                <div class ="mt-2">
                    @error('nama_karyawan')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="alamat" class = "form-label">Alamat</label>
                <input type="text" class = "form-control" name="alamat" id = "alamat">
                <div class ="mt-2">
                    @error('alamat')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="jenis_kelamin" class = "form-label">Jenis Kelamin</label>
                <select name ="jenis_kelamin" id = "jenis_kelamin" class ="form-select" > 
                    <option value="">--Pilih Jenis Kelamin Karyawan--</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
                <div class ="mt-2">
                    @error('jenis_kelamin')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="email" class = "form-label">Email</label>
                <input type="email" class = "form-control" name="email" id = "email">
                <div class ="mt-2">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="password" class = "form-label">Password</label>
                <input type="password" class = "form-control" name="password" id = "password">
                <div class ="mt-2">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "col-md-12">
                <label for="foto" class = "form-label">Foto</label>
                <input type="file" class = "form-control" name="foto" id = "foto">
                <div class ="mt-2">
                    @error('foto')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="jbt" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jbt" class="form-select">
                    <option value="">--Pilih Jabatan Karyawan--</option>
                    @foreach($jabatan as $item)
                    <option value="{{$item -> id}}">{{ $item->jabatan}} / {{ $item->status}}</option>
                    @endforeach
            </select>
            <div class ="mt-2">
                    @error('jabatan_id')
                        {{$message}}
                    @enderror
                </div>
            </div>
            <div class = "mt-3">
                <button class ="btn btn-primary" type ="submit" >Save Karyawan</button>
            </div>
        </form>
  </div>
</div>
@endsection
