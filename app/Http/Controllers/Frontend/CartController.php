<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $totals = $this->totals($cart);
        return view('frontend.cart.index', compact('cart', 'totals'));
    }

    public function add(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $qty = max(1, (int)$request->input('qty', 1));

        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
        } else {
            $cart[$id] = [
                'id'    => $product->id,
                'name'  => $product->name,
                'price' => (float)$product->price,
                'qty'   => $qty,
                'image' => $product->image, // store relative path
            ];
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Added to cart');
    }

    public function update(Request $request, int $id)
    {
        $qty = max(1, (int)$request->input('qty', 1));
        $cart = session('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
            session(['cart' => $cart]);
        }
        return back();
    }

    public function remove(int $id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        return back();
    }

    private function totals(array $cart): array
    {
        $subtotal = 0;
        foreach ($cart as $line) {
            $subtotal += $line['price'] * $line['qty'];
        }
        $shipping = 0; // customize later
        $total    = $subtotal + $shipping;
        return compact('subtotal', 'shipping', 'total');
    }
}
