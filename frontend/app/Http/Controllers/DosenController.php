<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DosenController extends Controller
{
    // Tampilkan data dosen dari API
    public function index()
    {
        $response = Http::get('http://localhost:8080/dosen');

        if ($response->successful()) {
            $dosen = $response->json();
            return view('tampil_dosen', ['dosen' => $dosen]);
        }

        return back()->with('error', 'Gagal mengambil data dosen dari API');
    }

    public function create()
    {
        $response = Http::get('http://localhost:8080/dosen'); 

        if ($response->successful()) {
            $dosen = $response->json();
            return view('tambah_dosen', compact('dosen'));
        }
        return view('tambah_dosen', ['dosen' => []])->withErrors(['msg' => 'Gagal mengambil data dosen']);
    }

    // Simpan data dosen baru lewat API
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nidn' => 'required|string',
            'email' => 'required|email',
            'prodi' => 'required|string',
        ]);

        $response = Http::post('http://localhost:8080/dosen', $request->only('nama', 'nidn', 'email', 'prodi'));

        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
        }

        return back()->with('error', 'Gagal menambahkan data dosen');
    }

    public function edit($nidn)
    {
        // Ambil data dosen berdasarkan NIDN
        $response = Http::get("http://localhost:8080/dosen/{$nidn}");

        // Cek apakah kedua response berhasil
        if ($response->successful()) {
            $dosen = $response->json();
            return view('edit_dosen', compact('dosen'));
        }
        return redirect()->back()->withErrors(['msg' => 'Gagal mengambil data dosen']);
    }


    // Update data dosen lewat API
    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama' => 'required|string',
            'nidn' => 'required|string',
            'email' => 'required|email',
            'prodi' => 'required|string',
        ]);

        $response = Http::put("http://localhost:8080/dosen/{$nidn}", $request->only('nama', 'nidn', 'email', 'prodi'));

        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui');
        }

        return back()->with('error', 'Gagal memperbarui data dosen');
    }

    // Hapus data dosen lewat API
    public function destroy($nidn)
    {
        $response = Http::delete("http://localhost:8080/dosen/{$nidn}");

        if ($response->successful()) {
            return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
        }

        return back()->with('error', 'Gagal menghapus data dosen');
    }


}
