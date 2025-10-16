@extends('layouts.admin')

@section('content')
<h2>Daftar Jadwal</h2>
<a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($schedules as $index => $schedule)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $schedule->user->name ?? '-' }}</td>
            <td>{{ $schedule->judul }}</td>
            <td>{{ $schedule->tanggal }}</td>
            <td>{{ $schedule->waktu }}</td>
            <td>{{ $schedule->category->nama_kategori ?? '-' }}</td>
            <td>{{ $schedule->deskripsi ?? '-' }}</td>
            <td>
                <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus jadwal?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada jadwal</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
