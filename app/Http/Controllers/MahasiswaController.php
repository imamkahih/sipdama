<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaCollection;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = new MahasiswaCollection(Mahasiswa::orderBy('prodi', 'DESC')->orderBy('semester', 'DESC')->orderBy('kelas', 'DESC')->orderBy('angkatan', 'DESC')->get());
        return Inertia::render('Dashboard', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Mahasiswa();
        $student->nama = $request->nama;
        $student->nim = $request->nim;
        $student->prodi = $request->prodi;
        $student->semester = $request->semester;
        $student->kelas = $request->kelas;
        $student->angkatan = $request->angkatan;
        $student->save();
        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa, Request $request)
    {
        return Inertia::render('Detail', [
            'mahasiswa' => $mahasiswa->find($request->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa, Request $request)
    {
        return Inertia::render('Edit', [
            'mahasiswa' => $mahasiswa->find($request->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        Mahasiswa::where('id', $request->id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'kelas' => $request->kelas,
            'angkatan' => $request->angkatan,
        ]);

        return to_route('dashboard')->with('message', 'Berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa, Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->delete();
        return redirect()->route('dashboard');
    }
}
