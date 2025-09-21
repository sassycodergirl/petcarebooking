<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    // Show all orders for logged-in user
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10); // pagination optional

        return view('customer.orders.index', compact('orders'));
    }

    // Show details of a single order
    public function show($id)
    {
        $order = Order::with(['items', 'addresses'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('customer.orders.show', compact('order'));
    }
}
