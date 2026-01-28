<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->with('course')->latest()->get();
        return view('orders.index', compact('orders'));
    }
}
