<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $jabatan  = Jabatan::all();
        return view ('jabatan.jabatan',compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('jabatan.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'jbt_kryawan' => 'required',
                'gaji_kryawan' => 'required',
                'stts_kryawan' => 'required',

            ],
            [
                'jbt_kryawan.required'=> 'jabatan karyawan tidak boleh kosong',
                'gaji_kryawan.required'=> 'gaji karyawan tidak boleh kosong',
                'stts_kryawan.required'=> 'status karyawan tidak boleh kosong',

            ]
            
            );

            $jabatan = new Jabatan (); 
            $jabatan -> jabatan = $request ['jbt_kryawan'];
            $jabatan -> gaji = $request ['gaji_kryawan'];
            $jabatan -> status = $request ['stts_kryawan'];
            $jabatan -> save();

            return redirect ('/jabatan');
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
        $jabatan  = Jabatan::find($id);
        return view ('jabatan.update',compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'jbt_kryawan' => 'required',
                'gaji_kryawan' => 'required',
                'stts_kryawan' => 'required',

            ]
            
            );

            $jabatan = jabatan::find ($id); 
            $jabatan -> jabatan = $request ['jbt_kryawan'];
            $jabatan -> gaji = $request ['gaji_kryawan'];
            $jabatan -> status = $request ['stts_kryawan'];
            $jabatan -> save();

            return redirect ('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::destroy('jabatan_id',$id);
        Jabatan::destroy('id',$id);
        return redirect ('/jabatan');
    }
}
