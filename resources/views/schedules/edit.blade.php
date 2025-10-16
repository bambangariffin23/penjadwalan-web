@extends('layouts.admin')

@section('content')
<h2>Edit Jadwal</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-select" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $schedule->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" value="{{ $schedule->judul }}" required>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $schedule->tanggal }}" required>
    </div>

    <div class="mb-3">
        <label for="waktu" class="form-label">Waktu</label>
        <input type="time" name="waktu" id="waktu" class="form-control" value="{{ $schedule->waktu }}" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $schedule->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->nama_kategori }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $schedule->deskripsi }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
