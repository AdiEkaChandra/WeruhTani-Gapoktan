<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

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
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'jenis_gabah' => 'required|string|max:255',
            'berat' => 'required|numeric',
            'durasi' => 'required|numeric',
            'status' => 'required|in:menunggu,berjalan,berhenti,selesai',
        ]);
    
        // Simpan ke database
        $pelanggan = Pelanggan::create($validated);
    
        // Debugging untuk memastikan penyimpanan
        // if ($pelanggan) {
        //     \Log::info('Data berhasil disimpan:', $pelanggan->toArray());
        // } else {
        //     \Log::error('Gagal menyimpan data pelanggan.');
        // }
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.tabel_pelanggan')->with('success', 'Pesanan berhasil disimpan!');
    }

    public function editPelanggan($id)
    {
        // Cari data pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // Tampilkan view untuk edit pelanggan dengan data yang ditemukan
        return view('admin.edit_pelanggan', compact('pelanggan'));
    }

    public function updatePelanggan(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'jenis_gabah' => 'required|string|max:255',
            'berat' => 'required|numeric',
            'durasi' => 'required|numeric',
            'status' => 'required|in:menunggu,berjalan,berhenti,selesai',
        ]);

        // Cari pelanggan berdasarkan ID dan perbarui data
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.tabel_pelanggan')->with('success', 'Data pelanggan berhasil diperbarui!');
    }
}
