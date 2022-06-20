<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderItem(request $request){
        
        $data = $request->all();
        $item = [];
        $item = $data->item;
        foreach($item as $i) {

        }
        if ($request) {
            //$purchase_id = DB::table('purchases')
            //    ->insertGetId(['customer_id'  => Auth::id(), 'date' => date('Y-m-d'),'total' => $request->price]);
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }
}
