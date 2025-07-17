@extends('layouts.app')

@section('content')
<div class="container">
    <h4>✏️ Edit Metode Pembayaran</h4>

    <form method="POST" action="{{ route('payment-methods.update', $paymentMethod) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Metode</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $paymentMethod->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('payment-methods.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
