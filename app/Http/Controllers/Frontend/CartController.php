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

    $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);
    $count = collect($cart)->sum('qty');

    return response()->json([
        'success' => true,
        'total'   => $total,
        'count'   => $count,
        'cart'    => $cart
    ]);
}

public function remove($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);
    $count = collect($cart)->sum('qty');

    return response()->json([
        'success' => true,
        'total'   => $total,
        'count'   => $count
    ]);
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
    $count = collect($cart)->sum('qty');

    return response()->json([
        'success'  => true,
        'id'       => $id,
        'qty'      => $cart[$id]['qty'] ?? 0,
        'subtotal' => isset($cart[$id]) ? $cart[$id]['price'] * $cart[$id]['qty'] : 0,
        'total'    => $total,
        'count'    => $count
    ]);
}

public function items()
{
    $cart = session()->get('cart', []);
    $total = collect($cart)->reduce(fn($c, $i) => $c + ($i['price'] * $i['qty']), 0);
    $count = collect($cart)->sum('qty');

    $html = '';
    foreach ($cart as $id => $item) {
       $html .= '
                <div class="product-infos mb-4 cart-item" data-id="'.$id.'">
                    <div class="product-info mb-0 d-flex">
                        <a href="#" class="product-img-pop">
                            <img src="'.asset("public/".$item['image']).'" alt="'.$item['name'].'">
                        </a>
                        <div class="product-details-pop ms-2">
                            <h4>'.$item['name'].'</h4>
                            <div class="variant-data d-flex align-items-center">
                                '.(!empty($item['size']) ? '<span class="me-2">Size: '.$item['size'].'</span>' : '').'
                                '.(!empty($item['color']) ? '<span>Color: '.$item['color'].'</span>' : '').'
                            </div>
                            <p><strong>₹'.$item['price'].'</strong></p>
                            <div class="pd-add-to-cart-wrap d-flex align-items-center">
                                <button class="qty-minus" 
                                    data-id="'.$id.'" 
                                    data-size="'.($item['size'] ?? '').'" 
                                    data-color="'.($item['color'] ?? '').'">-</button>
                                
                                <input type="text" value="'.$item['qty'].'" 
                                    class="qty item-qty" 
                                    data-id="'.$id.'" 
                                    data-size="'.($item['size'] ?? '').'" 
                                    data-color="'.($item['color'] ?? '').'" 
                                    readonly />
                                
                                <button class="qty-plus" 
                                    data-id="'.$id.'" 
                                    data-size="'.($item['size'] ?? '').'" 
                                    data-color="'.($item['color'] ?? '').'">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="remove-icon">
                        <button class="remove-item btn btn-sm btn-danger" 
                            data-id="'.$id.'" 
                            data-size="'.($item['size'] ?? '').'" 
                            data-color="'.($item['color'] ?? '').'">Remove</button>
                    </div>
                </div>
            ';

    }

    return response()->json([
        'html'  => $html,
        'total' => $total,
        'count' => $count
    ]);
}


    


   
}
