<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel di database
    protected $fillable = ['nama', 'email', 'telepon', 'alamat']; // Kolom-kolom yang dapat diisi
}
