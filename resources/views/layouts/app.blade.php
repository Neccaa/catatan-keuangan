<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Keuangan Harian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @auth
    <div class="d-flex">
        {{-- Sidebar --}}
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h5 class="mb-4">💰 Keuangan</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="{{ route('dashboard') }}" class="nav-link text-white">📊 Dashboard</a></li>
                <li class="nav-item mb-2"><a href="{{ route('transactions.index') }}" class="nav-link text-white">🧾 Transaksi</a></li>
                <li class="nav-item mb-2"><a href="{{ route('categories.index') }}" class="nav-link text-white">📂 Kategori</a></li>
                <li class="nav-item mb-2"><a href="{{ route('payment-methods.index') }}" class="nav-link text-white">💳 Metode</a></li>
                <li class="nav-item mb-2"><a href="{{ route('budgets.index') }}" class="nav-link text-white">📉 Anggaran</a></li>
                <li class="nav-item mb-2"><a href="{{ route('goals.index') }}" class="nav-link text-white">🎯 Target</a></li>
                <li class="nav-item mt-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-light btn-sm w-100">🔒 Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        {{-- Main Content --}}
        <main class="flex-grow-1 p-4" style="min-height: 100vh;">
            @yield('content')
        </main>
    </div>
    @else
        {{-- Guest layout --}}
        <main class="container py-5">
            @yield('content')
        </main>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
