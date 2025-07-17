<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::where('user_id', Auth::id())->get();
        return view('payment_methods.index', compact('methods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);

        PaymentMethod::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('payment-methods.index')->with('success', 'Metode ditambahkan');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate(['name' => 'required|string|max:100']);

        $paymentMethod->update($request->only('name'));

        return redirect()->route('payment-methods.index')->with('success', 'Metode diperbarui');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('payment-methods.index')->with('success', 'Metode dihapus');
    }
}
