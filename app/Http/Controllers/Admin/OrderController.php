<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'course'])->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function verify(Order $order)
    {
        $order->update(['status' => 'verified']);
        
        // Enroll user to course
        $order->user->enrolledCourses()->syncWithoutDetaching([
            $order->course_id => ['enrolled_at' => now()]
        ]);

        return back()->with('success', 'Order verified and student enrolled.');
    }

    public function reject(Order $order)
    {
        $order->update(['status' => 'rejected']);
        return back()->with('success', 'Order rejected.');
    }
}
