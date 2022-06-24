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
        $menu = DB::table('menus')
            ->select('*')
            ->where('deleted', false)
            ->get();
        return view('menu', compact('menu'));
    }

    public function orderMenu()
    {
        $menu = DB::table('menus')
            ->select('*')
            ->where('deleted', false)
            ->get();
        return view('order', compact('menu'));
    }

    public function additem($menu_code){

        $menu = DB::table('menus')
            ->select('*')
            ->where('deleted', false)
            ->get();
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

    public function addMenuItem(Request $request)
    { 
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $fileName = $image->getClientOriginalName();
            $image->storeAs('public/img', $fileName);
        }
        
        $category = $request->category;
        $name = $request->name;
        $code = $request->code;
        $des = $request->description;
        $nutri = $request->nutrition;
        $price = $request->price;
        $data = array('name' => $name, 'image' => $fileName, 'menu_code' => $code, 'category' => $category, 'description' => $des, "nutrition" => $nutri, 'price' => $price);
        $insert = DB::table('menus')->insert($data);
        
        if (!$insert) {
            return redirect()->back()->with('error', 'Sorry, there is a problem while creating product.');
        }
        return redirect()->action('App\Http\Controllers\MenuController@menuList')->with('success', 'New Item Added!');
    }

    public function delete($id)
    {
        DB::table('menus')
            ->where('id', $id)
            ->update(['deleted' => true]);
        return redirect()->action('App\Http\Controllers\MenuController@menuList')->with('success','Item deleted!');;
    }
} 