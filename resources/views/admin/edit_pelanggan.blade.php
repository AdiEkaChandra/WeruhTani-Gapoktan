@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('admin.update_pelanggan', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $pelanggan->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $pelanggan->no_hp }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_gabah" class="form-label">Jenis Gabah</label>
                            <input type="text" class="form-control" id="jenis_gabah" name="jenis_gabah" value="{{ $pelanggan->jenis_gabah }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="berat" class="form-label">Berat (Kg)</label>
                            <input type="text" class="form-control" id="berat" name="berat" value="{{ $pelanggan->berat }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="durasi" class="form-label">Durasi (Menit)</label>
                            <input type="text" class="form-control" id="durasi" name="durasi" value="{{ $pelanggan->durasi }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="menunggu" {{ $pelanggan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="berjalan" {{ $pelanggan->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                                <option value="berhenti" {{ $pelanggan->status == 'berhenti' ? 'selected' : '' }}>Berhenti</option>
                                <option value="selesai" {{ $pelanggan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
