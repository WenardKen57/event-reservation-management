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
}
