@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">📒 Daftar Transaksi</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">
        ➕ Tambah Transaksi
    </a>

    @if ($transactions->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Metode</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $trx)
                        <tr>
                            <td>{{ $trx->date }}</td>
                            <td>{{ $trx->category->name ?? '-' }}</td>
                            <td>{{ $trx->paymentMethod->name ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $trx->type === 'income' ? 'success' : 'danger' }}">
                                    {{ ucfirst($trx->type) }}
                                </span>
                            </td>
                            <td>Rp{{ number_format($trx->amount, 0, ',', '.') }}</td>
                            <td>{{ $trx->notes }}</td>
                            <td>
                                <a href="{{ route('transactions.edit', $trx) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                <form action="{{ route('transactions.destroy', $trx) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}
        </div>
    @else
        <p>Belum ada transaksi tercatat.</p>
    @endif
</div>
@endsection
