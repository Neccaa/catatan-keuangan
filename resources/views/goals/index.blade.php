@extends('layouts.app')

@section('content')
<div class="container">
    <h4>🎯 Target Tabungan</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('goals.create') }}" class="btn btn-primary mb-3">➕ Tambah Target</a>

    @if ($goals->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Tujuan</th>
                    <th>Nominal</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goals as $goal)
                    <tr>
                        <td>{{ $goal->title }}</td>
                        <td>Rp{{ number_format($goal->target_amount, 0, ',', '.') }}</td>
                        <td>{{ $goal->deadline }}</td>
                        <td>
                            <span class="badge bg-{{ $goal->is_completed ? 'success' : 'secondary' }}">
                                {{ $goal->is_completed ? 'Tercapai' : 'Berjalan' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('goals.edit', $goal) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada target tabungan.</p>
    @endif
</div>
@endsection
