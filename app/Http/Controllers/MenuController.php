<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        // $items = DB::select('select * from menu');

        $main = DB::table('menu')
            ->where('category', 'Main Course')
            ->get();

        $sides = DB::table('menu')
            ->where('category', 'Sides')
            ->get();

        $beverages = DB::table('menu')
            ->where('category', 'Beverages')
            ->get();

        $dessert = DB::table('menu')
            ->where('category', 'Dessert')
            ->get();


        // return view('menu', compact('items', 'main', 'sides', 'beverages', 'dessert'));
        return view('menu', compact('main', 'sides', 'beverages', 'dessert'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($code)
    {
        $item = DB::table('menu')
                ->where('menu_code', $code)
                ->get();
        
                $item = $item->toArray();
                $item = (array)$item[0];
        if(!$item) {
            abort(404);
        }
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $code => [
                        "name" => $item['name'],
                        "quantity" => 1,
                        "price" => $item['price'],
                        "photo" => $item['image']
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$code])) {

            $cart[$code]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$code] = [
            "name" => $item['name'],
            "quantity" => 1,
            "price" => $item['price'],
            "photo" => $item['image']
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        log:info("update cart");
        if($request->code and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->code]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->code]['quantity'] * $cart[$request->code]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        log:info("remove from cart");
        if($request->code) {

            $cart = session()->get('cart');

            if(isset($cart[$request->code])) {

                unset($cart[$request->code]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }

    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return number_format($total, 2);
    }

}
