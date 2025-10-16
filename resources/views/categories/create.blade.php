@extends('layouts.admin')

@section('content')
<h2>Tambah Kategori</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
