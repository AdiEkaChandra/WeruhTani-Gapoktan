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
    <div class="container mt-4">
        <h2 class="fw-bold" id="data-gabah">Data Gabah</h2>
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Pelanggan</h5>
                <form action="{{ route('home') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-light btn-sm">Cari</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr style="text-align: center; vertical-align: middle">
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Jenis Gabah</th>
                                <th>Berat (Kg)</th>
                                <th>Durasi (Menit)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelanggan as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nama_pelanggan }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->jenis_gabah }}</td>
                                <td>{{ $item->berat }}</td>
                                <td>{{ $item->durasi }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item->status == 'menunggu') bg-warning 
                                        @elseif($item->status == 'berjalan') bg-info 
                                        @elseif($item->status == 'berhenti') bg-danger 
                                        @else bg-success 
                                        @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-end">
                    {{ $pelanggan->links() }}
                </div>
            </div>
        </div>
    </div>
    
    

    <!-- Prediksi -->
    <section class="container my-5">
        <h2 class="fw-bold" id="prediksi">Prediksi Waktu Pengeringan</h2>
        <div class="row mt-4">
            <!-- Form -->
            <div class="col-md-6">
                <form id="predictionForm">
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
<script>
            document.getElementById('predictionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        const predictionOutput = document.getElementById('predictionOutput');

        fetch('http://127.0.0.1:5000/predict', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'  // Pastikan header JSON
            },
            body: JSON.stringify(data)  // Kirim data dalam format JSON
        })
        .then(response => response.json())
        .then(data => {
            if (data.hours !== undefined) {
                predictionOutput.textContent = `${data.hours} Jam ${data.minutes} Menit ${data.seconds} Detik`;
            } else if (data.error) {
                predictionOutput.textContent = `Error: ${data.error}`;
            }
        })
        .catch(error => {
            predictionOutput.textContent = `Error: ${error.message}`;
        });
    });
</script>
@endsection
