<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create(Course $course)
    {
        return view('checkout.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $order = Order::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'total_price' => $course->price,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created. Please upload payment proof.');
    }

    public function uploadProof(Request $request, Order $order)
    {
        $request->validate([
            'payment_proof' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $order->update(['payment_proof' => $path]);
        }

        return back()->with('success', 'Payment proof uploaded. We will verify it soon.');
    }
}
