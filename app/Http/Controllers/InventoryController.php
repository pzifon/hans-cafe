<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index(){
        $condiment = DB::table('inventory')
            ->select('*')
            ->where('category', 'Condiment')
            ->get();			
        $dairy = DB::table('inventory')
                    ->select('*')
                    ->where('category', 'Dairy')
                    ->get();
        $meat = DB::table('inventory')
                    ->select('*')
                    ->where('category', 'Meat')
                    ->get();
        return view('inventory', compact('condiment', 'dairy', 'meat'));
    }

    public function edit($category){
        $condiment = DB::table('inventory')
            ->select('*')
            ->where('category', 'Condiment')
            ->get();			
        $dairy = DB::table('inventory')
                    ->select('*')
                    ->where('category', 'Dairy')
                    ->get();
        $meat = DB::table('inventory')
                    ->select('*')
                    ->where('category', 'Meat')
                    ->get();
        return view('edit_inventory', compact('category', 'condiment', 'dairy', 'meat'));
    }

    public function update(Request $request){
        $item_code = $request->item_code;
        $qty = $request->item_qty;
        foreach ($item_code as $key => $code) {
            DB::table('inventory')
                ->where('item_code', $code)
                ->update(['stock' => $qty[$key]]);
        }
        return redirect()->action('App\Http\Controllers\InventoryController@index')->with('success','Inventory Updated!');
    }
}
