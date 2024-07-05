<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan  = karyawan::all();
        return view ('karyawan.karyawan',compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view ('karyawan.insert',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_karyawan' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required|unique:karyawans',
                'password' => 'required|min:6',
                'foto' => 'required|mimes:jpg,png,gif,jpeg|image',
                'jabatan_id' =>'required',

            ],
            [
                'nama_karyawan.required'=> 'nama karyawan anda salah',
                'alamat.required' => 'periksa alamat anda kembali',
                'jenis_kelamin.required'=> 'periksa kembali jenis kelamin anda',
                'email.required'=> 'email tidak boleh kosong',
                'email.unique'=> 'email tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong',
                'password.min' => 'password minimal 6 digits',
                'foto.required' => 'foto tidak boleh kosong',
                'foto.mimes' => 'extension foto hanya jpg,ong,jpeg, or gif',
                'jabatan_id.required' => 'foto tidak boleh kosong',

            ]
            
            );
        $path = $request -> file('foto')->store('public/images');
        $karyawan = new karyawan ();
        $karyawan -> jabatan_id = $request ['jabatan_id'];
        $karyawan -> namakaryawan = $request ['nama_karyawan'];
        $karyawan -> alamat = $request ['alamat'];
        $karyawan -> jeniskelamin = $request ['jenis_kelamin'];
        $karyawan -> email = $request ['email'];
        $karyawan -> password = Hash::make($request->password);
        $karyawan -> foto = basename($path);
        $karyawan -> save();

        return redirect ('/karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan  = Karyawan::find($id);
        $jabatan = Jabatan::all();
        return view ('karyawan.update',compact('karyawan','jabatan'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_karyawan' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required|unique:karyawans',
                'foto' => 'mimes:jpg,png,gif,jpeg|image',
                'jabatan_id' =>'required',

            ],
            [
                'nama_karyawan.required'=> 'nama karyawan anda salah',
                'alamat.required' => 'periksa alamat anda kembali',
                'jenis_kelamin.required'=> 'periksa kembali jenis kelamin anda',
                'email.required'=> 'email tidak boleh kosong',
                'email.unique'=> 'email tidak boleh kosong',
                'foto.mimes' => 'extension foto hanya jpg,ong,jpeg, or gif',
                'jabatan_id.required' => 'foto tidak boleh kosong',

            ]
            
            );
        
        if ($request -> foto){
            if ($request -> oldfoto){
                storage::delete ($request -> oldfoto);
            }

            $path = $request -> file('foto') -> store('public/images');
            
        }else{
            $path = $request -> oldfoto;
        }

        $karyawan  = Karyawan::find($id);
        $karyawan -> jabatan_id = $request ['jabatan_id'];
        $karyawan -> namakaryawan = $request ['nama_karyawan'];
        $karyawan -> alamat = $request ['alamat'];
        $karyawan -> jeniskelamin = $request ['jenis_kelamin'];
        $karyawan -> email = $request ['email'];
        $karyawan -> foto = basename($path);
        $karyawan -> save();

        return redirect ('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::destroy('id',$id);
        return redirect ('/Karyawan');
    }
}
