<?php

namespace App\Http\Controllers;

use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderItem(Request $request)
    {

        $data = $request->all();
        $item = $request->item;

        if ($request) {
            $purchase_id = DB::table('purchases')
                ->insertGetId(['customer_id'  => Auth::id(), 'date' => date('Y-m-d'), 'total' => $request->price]);

            foreach ($item as $key => $value) {
                $add_data = array('purchase_id' => $purchase_id, "menu_code" => $value["menu_code"], "price" => $value["price"], "quantity" => 1, 'subtotal' => $value["price"]);
                DB::table('orders')->insert($add_data);
            }

            return response()->json([
                'status' => 'success',
                'data' => $data,
                'item' => $item,
                'add_data' => $add_data,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }

    public function orderList()
    {
        $orderList = DB::table('purchases')
            ->select('*')
            ->where('payment_status', false)
            ->where('date', date("Y-m-d"))
            ->get();
        // $orders = DB::table('orders')
        //     ->join('purchases', 'purchases.id', '=', 'orders.purchase_id')
        //     ->select('orders.*')
        //     ->get();
        // foreach ($orders as $o) {
        //     $items = DB::table('menus')
        //         ->join('orders', 'orders.menu_code', '=', 'menus.menu_code')
        //         ->select('menus.name', 'menus.menu_code')
        //         ->get();
        // }
        return view('orderlist', compact('orderList'));
    }

    // public function getOrder()
    // {
    //     $order = DB::table('purchases')
    //         ->select('id')
    //         ->where('purchases.payment_status', false)
    //         ->where('date', date("Y-m-d"))
    //         ->get();

    //     foreach ($order as $key) {
    //         $id = array('id' => $key->id);
    //         $details = DB::table('orders')
    //             ->select('*')
    //             ->where('orders.purchase_id', $id)
    //             ->get();
    //     }

    //     return response()->json([
    //         'data' => "Success",
    //         'order' => $order,
    //         'details' => $details,
    //         'id' => $id,    
    //     ]);
    // }

    public function getOrder($purchase_id)
    {
        $order = DB::table('orders')
            ->select('*')
            ->join('menus', 'menus.menu_code', '=', 'orders.menu_code')
            ->where('purchase_id', $purchase_id)
            ->get();

        return response()->json([
            'data' => "Success",
            'order' => $order,
        ]);
    }

    public function payOrder($purchase_id)
    {
        $purchase = DB::table('purchases')
            ->select('*')
            ->where('id', $purchase_id)
            ->update(['payment_status' => true]);

        // return redirect()->route('orderlist');
        return response()->json([
            'data' => "Success",
            'purchases' => $purchase,
        ]);
    }
}
