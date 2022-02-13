<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        Log:
        info($cartItems);
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Item Added to Cart Successfully !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Quantity is Updated Successfully !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Cart Item Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }

    public function insertToDatabase()
    {   $items = [];
        \Cart::getContent()->each(function($item) use (&$items)
        {
            $items[] = $item;
        });
        $items = json_decode(json_encode($items)); //convert cartItems to array

        $total = 0;
        foreach ($items as $i){
            $subtotal = $i->price * $i->quantity;
            $total += $subtotal;
        }
        $purchase_id = DB::table('purchases')
            ->insertGetId(['customer_id'  => Auth::id(), 'date' => date('Y-m-d'),'total' => $total]);
	    print_r('Purchase id:', $purchase_id);

        foreach ($items as $i){
            $menu_code = DB::table('menus')->where('id', $i->id)->value('menu_code'); 
            $price = $i->price;
            $quantity = $i->quantity;
            $subtotal = $i->price * $i->quantity;
            $data = array('purchase_id' => $purchase_id, "menu_code" => $menu_code, "price" => $price, "quantity" => $quantity, 'subtotal' => $subtotal);
            DB::table('orders')->insert($data);
        }

        \Cart::clear();
        return redirect()->action('App\Http\Controllers\CustAccController@index')->with('success','Order Confirmed!');;
    }
}
