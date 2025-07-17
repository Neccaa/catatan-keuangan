@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">📊 Dashboard Keuangan</h4>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body text-success">
                    <h5>Pemasukan Bulan Ini</h5>
                    <h3>Rp{{ number_format($income, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger">
                <div class="card-body text-danger">
                    <h5>Pengeluaran Bulan Ini</h5>
                    <h3>Rp{{ number_format($expense, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body text-primary">
                    <h5>Saldo Bulan Ini</h5>
                    <h3>Rp{{ number_format($balance, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <h5>🧾 Transaksi Terbaru</h5>
    @if ($transactions->count())
        <table class="table table-sm table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $t)
                    <tr>
                        <td>{{ $t->date }}</td>
                        <td>{{ $t->description }}</td>
                        <td>{{ $t->category->name ?? '-' }}</td>
                        <td>Rp{{ number_format($t->amount, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $t->type == 'income' ? 'success' : 'danger' }}">
                                {{ ucfirst($t->type) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada transaksi bulan ini.</p>
    @endif
</div>
@endsection
