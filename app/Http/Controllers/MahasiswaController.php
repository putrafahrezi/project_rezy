<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $mhs = Mahasiswa::all();
        return view('mahasiswa.index',compact('nomor','mhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jur = Jurusan::all();
        return view('mahasiswa.form',compact('jur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nim' => 'required|unique:mahasiswas,nim',
        'nama' => 'required',
        'tempat' => 'required',
        'tanggal' => 'required',
        'alamat' => 'required',
        'jk' => 'required',
        'jurusans_id' => 'required',
        'agama' => 'required',

    ]);

    $mhs = new Mahasiswa;
    $mhs->nim = $request->nim;
    $mhs->nama = $request->nama;
    $mhs->tempat = $request->tempat;
    $mhs->tanggal = $request->tanggal;
    $mhs->alamat = $request->alamat;
    $mhs->jk = $request->jk;
    $mhs->jurusans_id = $request->jurusans_id;
    $mhs->agama = $request->agama;
    $mhs->save();

    return redirect('/mahasiswa/');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
