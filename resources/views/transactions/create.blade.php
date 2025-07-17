@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">➕ Tambah Transaksi</h3>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        @include('transactions.form')

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
