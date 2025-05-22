<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    // Tampilkan data mahasiswa
    public function index()
    {
        $response = Http::get('http://localhost:8080/mahasiswa');

        if ($response->successful()) {
            $mahasiswa = $response->json();
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
        }

        return back()->with('error', 'Gagal mengambil data mahasiswa');
    }

    // Simpan data mahasiswa baru lewat API
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email',
            'prodi' => 'required|string',
        ]);

        $response = Http::post('http://localhost:8080/mahasiswa', $request->only('nama', 'nim', 'email', 'prodi'));

        if ($response->successful()) {
            return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan');
        }

        return back()->with('error', 'Gagal menambahkan data mahasiswa');
    }

    // Update data mahasiswa lewat API
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email',
            'prodi' => 'required|string',
        ]);

        $response = Http::put("http://localhost:8080/mahasiswa/$nim", $request->only('nama', 'nim', 'email', 'prodi'));

        if ($response->successful()) {
            return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui');
        }

        return back()->with('error', 'Gagal memperbarui data mahasiswa');
    }

    // Hapus data mahasiswa lewat API
    public function destroy($nim)
    {
        $response = Http::delete("http://localhost:8080/mahasiswa/$nim");

        if ($response->successful()) {
            return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
        }

        return back()->with('error', 'Gagal menghapus data mahasiswa');
    }
}
