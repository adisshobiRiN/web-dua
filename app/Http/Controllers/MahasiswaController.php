<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); // Ambil semua data dari tabel mahasiswa
        return view('mahasiswa.index', compact('mahasiswas'))
               ->with('i', (request()->input('page', 1) - 1) * 5); // Untuk penomoran halaman
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kelas' => 'required',
    ]);

    Mahasiswa::create($request->all());

    return redirect()->route('mahasiswa.index')
                    ->with('success','Mahasiswa created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $mahasiswa = Mahasiswa::find($id);
    return view('mahasiswa.show', compact('mahasiswa'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $mahasiswa = Mahasiswa::find($id);
    if (!$mahasiswa) {
        abort(404); // Jika mahasiswa tidak ditemukan, tampilkan error 404
    }
    return view('mahasiswa.edit', compact('mahasiswa'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'kelas' => 'required',
    ]);

    $mahasiswa = Mahasiswa::find($id);
    if (!$mahasiswa) {
        abort(404); // Jika mahasiswa tidak ditemukan, tampilkan error 404
    }

    $mahasiswa->nama = $request->input('nama');
    $mahasiswa->kelas = $request->input('kelas');
    $mahasiswa->save();

    return redirect()->route('mahasiswa.index')
                    ->with('success', 'Mahasiswa updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $mahasiswa = Mahasiswa::find($id);
    if (!$mahasiswa) {
        abort(404); // Jika mahasiswa tidak ditemukan, tampilkan error 404
    }

    $mahasiswa->delete();

    return redirect()->route('mahasiswa.index')
                    ->with('success', 'Mahasiswa deleted successfully');
}

}
