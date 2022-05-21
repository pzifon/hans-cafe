<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = DB::table('purchases')
            ->select('*')
            ->where('customer_id', Auth::id())
            ->get();
        return view('purchases', compact('purchases'));
    }

    public function viewDetails($id){
        // $purchases = DB::table('purchases')
        //     ->select('*')
        //     ->where('customer_id', Auth::id())
        //     ->get();
        // $purchase_id = $request->input('view_details');
        // $orders = DB::table('orders')
        //     ->join('menus', 'menus.menu_code', '=', 'orders.menu_code')
        //     ->where('orders.purchase_id', $purchase_id)
        //     ->get();
        // $total = DB::table('orders')
        //     ->where('purchase_id', $purchase_id)
        //     ->sum('subtotal');

        // return view('purchases', compact('purchases', 'orders', 'total'));

        $purchases = Purchase::find($id);
        $orders = DB::table('orders')
            ->join('menus', 'menus.menu_code', '=', 'orders.menu_code')
            ->where('orders.purchase_id', $id)
            ->get();
        $total = DB::table('orders')
            ->where('purchase_id', $id)
            ->sum('subtotal');
        if($purchases){
            return response()->json([   
                'status'=>200,
                'order'=>$orders,
                'total'=>$total,
            ]);
        }
        else {
            return response()->json([
                'status'=>404,
                'purchases'=>'error',
            ]);
        }
    }
}