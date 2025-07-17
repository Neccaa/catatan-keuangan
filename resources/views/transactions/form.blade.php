<div class="mb-3">
    <label for="date" class="form-label">Tanggal</label>
    <input type="date" name="date" class="form-control" value="{{ old('date', $transaction->date ?? '') }}">
    @error('date') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Kategori</label>
    <select name="category_id" class="form-control">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id', $transaction->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
    @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
    <select name="payment_method_id" class="form-control">
        <option value="">-- Pilih Metode --</option>
        @foreach ($methods as $method)
            <option value="{{ $method->id }}" {{ old('payment_method_id', $transaction->payment_method_id ?? '') == $method->id ? 'selected' : '' }}>
                {{ $method->name }}
            </option>
        @endforeach
    </select>
    @error('payment_method_id') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label">Jenis Transaksi</label>
    <select name="type" class="form-control">
        <option value="income" {{ old('type', $transaction->type ?? '') == 'income' ? 'selected' : '' }}>Pemasukan</option>
        <option value="expense" {{ old('type', $transaction->type ?? '') == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
    </select>
    @error('type') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="amount" class="form-label">Nominal</label>
    <input type="number" name="amount" class="form-control" value="{{ old('amount', $transaction->amount ?? '') }}">
    @error('amount') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="notes" class="form-label">Catatan (Opsional)</label>
    <textarea name="notes" class="form-control">{{ old('notes', $transaction->notes ?? '') }}</textarea>
</div>
