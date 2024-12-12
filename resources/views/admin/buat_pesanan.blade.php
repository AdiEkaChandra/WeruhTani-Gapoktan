@extends('admin.layout')

@section('content')
<h3>Buat Pesanan</h3>
<div class="form-container">
    <form action="{{ route('admin.simpan_pesanan') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="mb-3">
            <label for="jenis_gabah" class="form-label">Jenis Gabah</label>
            <input type="text" class="form-control" id="jenis_gabah" name="jenis_gabah" required>
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat (Kg)</label>
            <input type="text" class="form-control" id="berat" name="berat" required>
        </div>
        <div class="mb-3">
            <label for="suhu_awal" class="form-label">Suhu Awal (°C)</label>
            <input type="text" class="form-control" id="suhu_awal" name="suhu_awal" required>
        </div>
        <div class="mb-3">
            <label for="kadar_air" class="form-label">Kadar Air Awal (%)</label>
            <input type="text" class="form-control" id="kadar_air" name="kadar_air" required>
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi (Menit)</label>
            <input type="text" class="form-control" id="durasi" name="durasi" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </form>
</div>
@endsection
