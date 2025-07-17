@extends('layouts.app')

@section('content')
<div class="container">
    <h4>➕ Tambah Metode Pembayaran</h4>

    <form method="POST" action="{{ route('payment-methods.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Metode</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('payment-methods.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
