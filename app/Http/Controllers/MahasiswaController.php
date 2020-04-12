<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
Use Alert;

class MahasiswaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'mhsw_nim' => 'required',
            'mhsw_nama' => 'required',
            'mhsw_alamat' => 'nullable',
            'mhsw_nama' => 'nullable'
        ],
        [ 
            'mhsw_nim.required' => 'NIM Wajib Diisi',
            'mhsw_nama.required' => 'Nama Wajib Diisi',
        ]);

        Mahasiswa::create([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_alamat' => $request->mhsw_alamat,
            'mhsw_prodi' => $request->mhsw_prodi
        ]);

        return redirect('/dashboard/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Mahasiswa::find($id);

        return view('mahasiswa.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mhsw_nim' => 'required',
            'mhsw_nama' => 'required',
            'mhsw_alamat' => 'nullable',
            'mhsw_nama' => 'nullable'
        ],
        [ 
            'mhsw_nim.required' => 'NIM Wajib Diisi',
            'mhsw_nama.required' => 'Nama Wajib Diisi',
        ]);

        $row = Mahasiswa::findOrFail($id);
        $row->update([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_alamat' => $request->mhsw_alamat,
            'mhsw_prodi' => $request->mhsw_prodi
        ]);

        return redirect('/dashboard/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Mahasiswa::findOrFail($id);
        $row->delete();

        Alert::success('Sucsess', 'Your record has been deleted');
        return redirect('/dashboard/mahasiswa');
    }
}
