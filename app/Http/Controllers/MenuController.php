<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        // $menu = DB::select('select * from menu');

        $main = DB::table('menu')
            ->where('category', 'Main Course')
            ->get();

        $sides = DB::table('menu')
            ->where('category', 'Sides')
            ->get();

        $beverages = DB::table('menu')
            ->where('category', 'Beverages')
            ->get();

        $dessert = DB::table('menu')
            ->where('category', 'Dessert')
            ->get();


        return view('menu', ['main' => $main, 'sides' => $sides, 'beverages' => $beverages, 'dessert' => $dessert]);
    }
}
