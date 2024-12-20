<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class HomeController extends Controller
{
        public function index(Request $request)
    {
        $search = $request->input('search');
        $pelanggan = Pelanggan::when($search, function ($query, $search) {
            return $query->where('nama_pelanggan', 'like', "%$search%");
        })->paginate(10); // Batas 10 data per halaman
        
        return view('home', compact('pelanggan'));
    }
}
