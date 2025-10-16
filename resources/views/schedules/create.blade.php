@extends('layouts.admin')

@section('content')
<h2>Tambah Jadwal</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('schedules.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select name="user_id" id="user_id" class="form-select" required>
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu" class="form-label">Waktu</label>
        <input type="time" name="waktu" id="waktu" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
