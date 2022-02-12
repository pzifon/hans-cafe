<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
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

    public function viewDetails(Request $request){
        $purchases = DB::table('purchases')
            ->select('*')
            ->where('customer_id', Auth::id())
            ->get();

        $purchase_id = $request->input('view_details');
        $orders = DB::table('orders')
            ->join('menu', 'menu.menu_code', '=', 'orders.menu_code')
            ->where('orders.purchase_id', $purchase_id)
            ->get();
        $total = DB::table('orders')
            ->where('purchase_id', $purchase_id)
            ->sum('subtotal');
        log:info($total);
        return view('purchases', compact('purchases', 'orders', 'total'));
    }
}