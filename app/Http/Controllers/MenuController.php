<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menuList()
    {
        $menu = Menu::all();
        return view('menu', compact('menu'));
    }

    public function orderMenu()
    {
        // $menu = Menu::find('deleted',false);
        $menu = DB::table('menus')
            ->select('*')
            ->where('deleted', false)
            ->get();
        return view('order', compact('menu'));
    }

    public function additem($menu_code){

        $menu_details = DB::table('menus')
            ->select('*')
            ->where('menu_code', $menu_code)
            ->get();
        if($menu_details){
            return response()->json([   
                'status'=>200,
                'details'=>$menu_details,
            ]);
        }
        else {
            return response()->json([
                'status'=>404,
                'order'=>'error',
            ]);
        }
    }

    public function getItem(){

        $menu_name = DB::table('menus')
            ->select('name')
            ->get();
        return response()->json([
            'name'=>$menu_name,
        ]);
    }
} 