<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $now = Carbon::now();

        $income = Transaction::where('user_id', $userId)
            ->whereMonth('date', $now->month)
            ->whereYear('date', $now->year)
            ->where('type', 'income')
            ->sum('amount');

        $expense = Transaction::where('user_id', $userId)
            ->whereMonth('date', $now->month)
            ->whereYear('date', $now->year)
            ->where('type', 'expense')
            ->sum('amount');

        $latestTransactions = Transaction::where('user_id', $userId)
            ->latest('date')->take(5)->get();

        return view('dashboard', [
            'income' => $income,
            'expense' => $expense,
            'balance' => $income - $expense,
            'transactions' => $latestTransactions,
        ]);
    }
}
