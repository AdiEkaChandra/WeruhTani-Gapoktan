@extends('layouts.app')

@section('title', 'WeruhTani - Gapoktan')

@section('content')
<!-- Header -->
<header class="text-white text-end position-relative" style="height: 920px; background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgb(0, 0, 0) 100%), url('{{ asset('images/gambarsawah.jpg') }}') no-repeat center center/cover; margin-top: -56px;" id="header">
    <div class="d-flex h-100 align-items-center justify-content-center">
        <div class="text-center" style="height: 550px;">
            <h1 class="display-4 fw-bold">GAPOKTAN SRI MAKMUR III</h1>
            <p class="mt-2">WeruhTani merupakan aplikasi web untuk memantau tingkat kadar air gabah</p>
        </div>
    </div>
</header>


<main class="container my-5">
    <!-- Data Gabah -->
    <section class="mb-5">
        <h2 class="fw-bold" id="data-gabah">Data Gabah</h2>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr class="table-secondary">
                    <th>No.</th>
                    <th>Jenis Gabah</th>
                    <th>Berat (kg)</th>
                    <th>Suhu Awal (C)</th>
                    <th>Kadar Air Awal (%)</th>
                    <th>Suhu Akhir (C)</th>
                    <th>Kadar Air Akhir (%)</th>
                    <th>Durasi (Menit)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Tambahkan data gabah dari database -->
                </tr>
            </tbody>
        </table>
    </section>

    <!-- Prediksi -->
    <section class="my-5">
        <h2 class="fw-bold" id="prediksi">Prediksi Waktu Pengeringan</h2>
        <div class="row mt-4">
            <!-- Form -->
            <div class="col-md-6">
                <form action="{{ route('predict') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Berat (kg)</label>
                        <input type="number" class="form-control" name="massa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Suhu Awal (C)</label>
                        <input type="number" class="form-control" name="suhu_awal" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kadar Air Awal (%)</label>
                        <input type="number" class="form-control" name="kadar_air_awal" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Suhu Akhir (C)</label>
                        <input type="number" class="form-control" name="suhu_akhir" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kadar Air Akhir (%)</label>
                        <input type="number" class="form-control" name="kadar_air_akhir" required>
                    </div>
                    <button type="submit" class="btn btn-outline-dark w-100">Prediksi</button>
                </form>
            </div>

            <!-- Hasil -->
            <div class="col-md-6">
                <div class="border p-4 text-center rounded shadow-sm">
                    <p class="h5 fw-bold">Hasil Prediksi</p>
                    <p id="predictionOutput" class="display-4 fw-bold mt-3">--</p>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
