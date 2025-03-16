<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('customer.transactions.rentals.create', compact('rentals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'rental_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:rental_date',
            'quantity' => 'required|integer|min:1',
        ]);

        // Store rental request (optional: integrate with transactions)
        return redirect()->route('customer.dashboard')->with('success', 'Rental request submitted!');
    }
}
