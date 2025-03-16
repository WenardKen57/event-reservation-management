<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{
    public function dashboard() {

        $reservations = Event::all();
        return view('admin.dashboard', compact('reservations'));
    }
    
    public function approve($reservationId) {
        $reservation = Event::findOrFail($reservationId);
        $reservation->status = 'approved';
        $reservation->save();

        return redirect()->back()->with('status', 'Reservation approved.');
    }

    public function disapprove($reservationId) {
        $reservation = Event::findOrFail($reservationId);
        $reservation->status = 'disapproved';
        $reservation->save();

        return redirect()->back()->with('status', 'Reservation disapproved.');
    }
}
