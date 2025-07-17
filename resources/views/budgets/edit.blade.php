@extends('layouts.app')

@section('content')
<div class="container">
    <h4>✏️ Edit Anggaran</h4>

    <form method="POST" action="{{ route('budgets.update', $budget) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $budget->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Nominal Anggaran</label>
            <input type="number" name="amount" class="form-control" value="{{ old('amount', $budget->amount) }}" required>
            @error('amount') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Periode Mulai</label>
            <input type="date" name="period_start" class="form-control" value="{{ old('period_start', $budget->period_start) }}" required>
            @error('period_start') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Periode Akhir</label>
            <input type="date" name="period_end" class="form-control" value="{{ old('period_end', $budget->period_end) }}" required>
            @error('period_end') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('budgets.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
