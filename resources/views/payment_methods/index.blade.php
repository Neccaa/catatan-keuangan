@extends('layouts.app')

@section('content')
<div class="container">
    <h4>💳 Metode Pembayaran</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('payment-methods.create') }}" class="btn btn-primary mb-3">
        ➕ Tambah Metode
    </a>

    @if ($methods->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Metode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($methods as $method)
                    <tr>
                        <td>{{ $method->name }}</td>
                        <td>
                            <a href="{{ route('payment-methods.edit', $method) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('payment-methods.destroy', $method) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus metode ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada metode pembayaran tercatat.</p>
    @endif
</div>
@endsection
