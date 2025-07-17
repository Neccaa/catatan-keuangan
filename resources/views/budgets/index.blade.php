@extends('layouts.app')

@section('content')
<div class="container">
    <h4>📊 Anggaran Per Kategori</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('budgets.create') }}" class="btn btn-primary mb-3">➕ Tambah Anggaran</a>

    @if ($budgets->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nominal</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($budgets as $budget)
                    <tr>
                        <td>{{ $budget->category->name ?? '-' }}</td>
                        <td>Rp{{ number_format($budget->amount, 0, ',', '.') }}</td>
                        <td>{{ $budget->period_start }} s/d {{ $budget->period_end }}</td>
                        <td>
                            <a href="{{ route('budgets.edit', $budget) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('budgets.destroy', $budget) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada anggaran ditambahkan.</p>
    @endif
</div>
@endsection
