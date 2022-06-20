<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderItem(request $request){
        
        $data = $request->all();
        $item = $request->item;
        
        if ($request) {
            $purchase_id = DB::table('purchases')
               ->insertGetId(['customer_id'  => Auth::id(), 'date' => date('Y-m-d'),'total' => $request->price]);

            foreach($item as $i) {
                $add_data = array('purchase_id' => $purchase_id, "menu_code" => $item->menu_code, "price" => $item->price, "quantity" => 1, 'subtotal' => $item->price);
            }

            DB::table('orders')->insert($add_data);

            return response()->json([
                'status' => 'success',
                'data' => $data,
                'item' => $item,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }
}
