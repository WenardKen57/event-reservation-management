<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class CustomerController extends Controller
{
    public function dashboard() {
        return view('customer.dashboard');
    }

    public function make_reservation() {
        $packages = Package::all();
        return view('customer.transactions.make-reservation', compact('packages'));
    }

    public function store_reservation(Request $request) {
        
    }
}
