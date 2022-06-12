<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Debugbar;
use DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menuList()
    {
        $menu = Menu::all();
        Debugbar::info("testing");
        return view('menu', compact('menu'));
    }

    public function orderMenu()
    {
        $menu = Menu::all();
        return view('order', compact('menu'));
    }

    public function additem($menu_code){

        $menu = Menu::all();
        $menu_details = DB::table('menus')
            ->select('*')
            ->where('menu_code', $menu_code)
            ->get();
        $menu_name = DB::table('menus')
            ->select('name')
            ->where('menu_code', $menu_code)
            ->get();
        if($menu){
            return response()->json([   
                'status'=>200,
                'code'=>$menu_code,
                'name'=>$menu_name,
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
} 