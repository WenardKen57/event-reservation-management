<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\RentalTransaction;
use App\Http\Controllers\Auth;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('customer.transactions.rentals.create', compact('rentals'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return back()->withErrors(['error' => 'User not authenticated']);
        }

        $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'rental_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:rental_date',
            'quantity' => 'required|integer|min:1',
        ]);

        $rental = Rental::findOrFail($request->rental_id);
        $days = (strtotime($request->return_date) - strtotime($request->rental_date)) / 86400;
        $totalPrice = $days * $rental->price_per_day * $request->quantity;

        $rentalTransactions = RentalTransaction::create([
            'users_id' => $user->id,
            'rentals_id' => $rental->id,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        //dd($user->id);
        Transaction::create([
            'users_id' => auth()->user()->id,
            'transactionable_id' => $rentalTransactions->id,
            'transactionable_type' => RentalTransaction::class,
            'status' => 'pending'
        ]);

        return redirect(route('customer.dashboard'));
    }
}
