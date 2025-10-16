@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Halo, {{ $user->name }}</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-4 col-sm-6 mb-2">
            <div class="card bg-primary text-white p-3 shadow-sm text-center">
                <h5>Total Jadwal</h5>
                <h3>{{ $totalSchedules }}</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-2">
            <div class="card bg-success text-white p-3 shadow-sm text-center">
                <h5>Total User</h5>
                <h3>{{ $totalUsers }}</h3>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-2">
            <div class="card bg-warning text-white p-3 shadow-sm text-center">
                <h5>Total Kategori</h5>
                <h3>{{ $totalCategories }}</h3>
            </div>
        </div>
    </div>

    {{-- Tabel Jadwal --}}
    <div class="card p-3 shadow-sm">
        <h5>Daftar Jadwal</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>User</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $index => $schedule)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $schedule->judul }}</td>
                        <td>{{ $schedule->user->name ?? '-' }}</td>
                        <td>{{ $schedule->category->nama_kategori ?? '-' }}</td>
                        <td>
                            {{-- Dropdown untuk ubah status --}}
                            <form action="{{ route('schedules.updateStatus', $schedule->id) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                    <option value="pending" {{ $schedule->status=='pending' ? 'selected':'' }}>Pending</option>
                                    <option value="selesai" {{ $schedule->status=='selesai' ? 'selected':'' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $schedule->status=='dibatalkan' ? 'selected':'' }}>Dibatalkan</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus jadwal?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
