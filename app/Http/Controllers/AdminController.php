<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function tabelPelanggan(Request $request)
    {
        $search = $request->input('search');
        $pelanggan = Pelanggan::when($search, function ($query, $search) {
            return $query->where('nama_pelanggan', 'like', "%$search%");
        })->paginate(10);
    
        return view('admin.tabel_pelanggan', compact('pelanggan'));
    }
    

    public function deletePelanggan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('admin.tabel_pelanggan')->with('success', 'Data berhasil dihapus');
    }

    public function buatPesanan()
    {
        return view('admin.buat_pesanan');
    }

    public function simpanPesanan(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'jenis_gabah' => 'required|string|max:255',
            'berat' => 'required|numeric',
            'suhu_awal' => 'required|numeric',
            'kadar_air' => 'required|numeric',
            'durasi' => 'required|numeric',
        ]);

        // Proses simpan ke database (opsional, sesuai kebutuhan)
        // Pesanan::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Pesanan berhasil disimpan!');
    }
}
