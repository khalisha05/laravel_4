@extends('layout.main')
@section('title')
    Insert Jabatan
@endsection
@section('content')
<h2 class= "mt-3">Insert Jabatan</h2>
    <hr>
    <div class="card">
  <div class="card-header">
        Formulir Tambahan Jabatan
  </div>
  <div class="card-body">
        <form action="/savejabatan" method = "post">
            @csrf
            <div class = "col-md-12">
                <label for="jbt" class = "form-label">Jabatan</label>
                <input type="text" class = "form-control" name="jbt_kryawan" id = "jbt" >
                @error('jbt_kryawan')
                        {{$message}}
                    @enderror
                
            </div>
                    
            <div class = "col-md-12">
                <label for="gaji" class = "form-label">Gaji</label>
                <input type="number" class = "form-control" name="gaji_kryawan" id = "gaji">
                @error('gaji_karyawan')
                        {{$message}}
                    @enderror
            </div>

            
            <div class = "col-md-12">
                <label for="status" class = "form-label">Status</label>
                <select name ="stts_kryawan" id = "stts" class ="form-select" > 
                    <option value="">--Pilih Status Jabatan--</option>
                    <option value="Tetap">Tetap</option>
                    <option value="Honor">Honor</option>
                </select>
                @error('stts_karyawan')
                        {{$message}}
                    @enderror
            </div>
            
            <div class = "mt-3">
                <button class ="btn btn-primary" type ="submit" >Save Jabatan</button>
            </div>
        </form>
  </div>
</div>
@endsection
