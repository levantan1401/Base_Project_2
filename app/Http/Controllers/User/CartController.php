<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Order;
use App\Models\product;

class CartController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('customer');
    }

    
    public function add(CartHelper $cart, $id)
    {
        $product = product::find($id);

        $cart->add($product);

        return redirect()->back();
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(CartHelper $cart, $id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }

    public function clear()
    {
        # code...
    }

    public function Mycart($id)
    {
        $order = Order::find($id);
    }
}
