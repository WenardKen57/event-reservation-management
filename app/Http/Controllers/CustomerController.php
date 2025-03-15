<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Package;

class CustomerController extends Controller
{
    public function dashboard() {
        $reservations = Event::where('users_id', auth()->id())->latest()->get();
        return view('customer.dashboard', compact('reservations'));
    }

    public function make_reservation() {
        $packages = Package::all();
        return view('customer.transactions.make-reservation', compact('packages'));
    }

    public function store_reservation(Request $request) {

        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date|after_or_equal:today', // Ensure event date is today or in the future
            'event_time' => 'required',
            'location' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(\+63|0)[9]\d{9}$/'], // Validate Philippine phone number format
            'event_type' => 'required|string|in:wedding,birthday,other',
            'guest_count' => 'required|integer|min:1|max:500', // Min 1, Max 500 guests
            'package_id' => 'required|exists:package,id',
        ]);

        $validated['users_id'] = auth()->id();
        Event::create($validated);

        return redirect(route('customer.dashboard'));
    }
}
