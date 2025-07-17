@extends('layouts.app')

@section('content')
<div class="container">
    <h4>✏️ Edit Target Tabungan</h4>

    <form method="POST" action="{{ route('goals.update', $goal) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul Target</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $goal->title) }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Nominal Target</label>
            <input type="number" name="target_amount" class="form-control" value="{{ old('target_amount', $goal->target_amount) }}" required>
            @error('target_amount') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Batas Waktu</label>
            <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $goal->deadline) }}" required>
            @error('deadline') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="is_completed" id="is_completed" {{ old('is_completed', $goal->is_completed) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_completed">Sudah Tercapai?</label>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('goals.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
