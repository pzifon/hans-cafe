<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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
} 