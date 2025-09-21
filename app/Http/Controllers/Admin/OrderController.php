<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items', 'shippingAddress')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items', 'shippingAddress', 'billingAddress')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
