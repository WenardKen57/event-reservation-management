<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard() {
        return view('customer.dashboard');
    }

    public function make_reservation() {
        return view('customer.transactions.make-reservation');
    }
}
