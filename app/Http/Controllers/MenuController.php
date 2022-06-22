<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use DB;
use Debugbar;
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

    public function editMenu($id)
    {
        $item = DB::table('menus')
            ->select('*')
            ->where('id', $id)
            ->get();
        return view('editMenu', compact('item'));
    }

    public function editMenuItem(Request $request)
    {   
        $id = $request->input("id");
        $name = $request->input("name");
        $des = $request->input("description");
        $nutri = $request->input("nutrition");
        $price = $request->input("price");
        DB::table('menus')
            ->where('id', $id)
            ->update(['name' => $name,'description' => $des, "nutrition" => $nutri, 'price' => $price]);
        return redirect()->action('App\Http\Controllers\MenuController@menuList')->with('success','Menu details updated successfully!');
    }
} 