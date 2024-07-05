@extends('layout.main')
@section('title')
    Insert Jabatan
@endsection
@section('content')
<h2 class= "mt-3">Update Jabatan</h2>
    <hr>
    <div class="card">
  <div class="card-header">
        Formulir Edit Jabatan
  </div>
  <div class="card-body">
        <form action="/updatejabatan/{{$jabatan->id}}" method = "post">
            @method('PUT')
            @csrf
            <div class = "col-md-12">
                <label for="jbt" class = "form-label">Jabatan</label>
                <input type="text" value="{{$jabatan->jabatan}}" class = "form-control" name="jbt_kryawan" id = "jbt">
            </div>
            <div class = "col-md-12">
                <label for="gaji" class = "form-label">Gaji</label>
                <input type="number" value = "{{$jabatan -> gaji}}" class = "form-control" name="gaji_kryawan" id = "gaji">
            </div>
            <div class = "col-md-12">
                <label for="status" class = "form-label">Status</label>
                <select name ="stts_kryawan" id = "stts" class ="form-select" > 
                    @if ($jabatan -> status == 'Tetap')
                    <option value="{{$jabatan -> status}}">{{$jabatan -> status}}</option>
                    <option value="Honor">Honor</option>
                    @else
                    <option value="{{$jabatan -> status}}">{{$jabatan -> status}}</option>
                    <option value="Tetap">Tetap</option>
                    @endif
                    
                </select>
            </div>
            <div class = "mt-3">
                <button class ="btn btn-primary" type ="submit" >Update Jabatan</button>
            </div>
        </form>
  </div>
</div>
@endsection
