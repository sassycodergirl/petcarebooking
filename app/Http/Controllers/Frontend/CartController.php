<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        return view('frontend.cart');
    }

    public function add(Request $request, $id)
{
    $cart = session()->get('cart', []);
    $qty = $request->input('qty', 1);

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += $qty;
    } else {
        $product = Product::findOrFail($id);
        $cart[$id] = [
            'name'  => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'qty'   => $qty
        ];
    }

    session()->put('cart', $cart);

    return response()->json(['success' => true]);
}

public function remove($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return response()->json(['success' => true]);
}

public function items()
{
    $cart = session()->get('cart', []);
    $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);

    // Build cart HTML
    $html = '';
    foreach ($cart as $id => $item) {
        $html .= '
            <div class="cart-item d-flex align-items-center justify-content-between mb-2">
                <div class="d-flex align-items-center">
                    <img src="'.asset("public/".$item['image']).'" width="50" class="me-2">
                    <div>
                        <p class="m-0">'.$item['name'].'</p>
                        <small>Qty: '.$item['qty'].'</small>
                    </div>
                </div>
                <div>
                    <p class="m-0">₹'.($item['price'] * $item['qty']).'</p>
                    <button class="remove-from-cart btn btn-sm btn-danger" data-id="'.$id.'">Remove</button>
                </div>
            </div>
        ';
    }

    return response()->json([
        'html' => $html,
        'total' => $total
    ]);
}


   
}
