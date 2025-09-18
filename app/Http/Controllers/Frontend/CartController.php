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
        $qty = (int) $request->input('quantity', 1);

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

        $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);

        return response()->json(['success' => true, 'total' => $total]);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $qty = (int) $request->input('quantity', 1);

        if (isset($cart[$id])) {
            if ($qty > 0) {
                $cart[$id]['qty'] = $qty;
            } else {
                unset($cart[$id]); // remove if 0
            }
            session()->put('cart', $cart);
        }

        $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);

        return response()->json([
            'success'  => true,
            'id'       => $id,
            'qty'      => $cart[$id]['qty'] ?? 0,
            'subtotal' => isset($cart[$id]) ? $cart[$id]['price'] * $cart[$id]['qty'] : 0,
            'total'    => $total
        ]);
    }

    public function items()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);

        $html = '';
        foreach ($cart as $id => $item) {
            $html .= '
                <div class="cart-item d-flex align-items-center justify-content-between mb-2" data-id="'.$id.'">
                    <div class="d-flex align-items-center">
                        <img src="'.asset("public/".$item['image']).'" width="50" class="me-2">
                        <div>
                            <p class="m-0">'.$item['name'].'</p>
                            <div class="d-flex align-items-center">
                                <button class="qty-btn decrease" data-id="'.$id.'">-</button>
                                <span class="mx-2 item-qty">'.$item['qty'].'</span>
                                <button class="qty-btn increase" data-id="'.$id.'">+</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="m-0 item-subtotal">₹'.($item['price'] * $item['qty']).'</p>
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
