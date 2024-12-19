@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tabel Pelanggan</h5>
            <form action="{{ route('admin.tabel_pelanggan') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-light btn-sm">Cari</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Jenis Gabah</th>
                            <th>Berat (Kg)</th>
                            <th>Durasi (Menit)</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
                            <td>
                                <a href="{{ route('admin.edit_pelanggan', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.delete_pelanggan', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data tidak ditemukan.</td>
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
@endsection
