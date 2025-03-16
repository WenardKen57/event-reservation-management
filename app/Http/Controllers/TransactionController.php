<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;
use App\Models\Rental;
use App\Models\MealPackage;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $rentals = Rental::all();
        $mealPackages = MealPackage::all();

        return view('customer.transactions.create', compact('events', 'rentals', 'mealPackages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'rental_id' => 'nullable|exists:rentals,id',
            'meal_package_id' => 'nullable|exists:meal_packages,id',
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'rental_id' => $request->rental_id,
            'meal_package_id' => $request->meal_package_id,
            'status' => 'pending',
            'total_amount' => 0, // You may calculate based on selections
        ]);

        return redirect()->route('customer.transactions.index')->with('success', 'Transaction created successfully.');
    }
}
