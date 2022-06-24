<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Debugbar;
use DateTime;
use Illuminate\Support\Carbon;

class RevenueController extends Controller
{
    public function revenueByYear()
    {
        $title = "This Year";
        $result = DB::table('orders')
            ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
            ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
            ->select('menus.category', DB::raw("SUM(orders.subtotal) as profit"),  DB::raw("date_part('month', purchases.date)  as month"))
            ->whereYear('purchases.date', Carbon::now()->year)
            ->groupby('month','menus.category')
            ->orderby('month')
            ->orderby('menus.category')
            ->get();
        $data = json_decode($result, true);
        $main = array(); $side = array(); $beverage = array(); $dessert = array();
        foreach ($data as $d){
            if ($d['category'] == "Main_Course"){
                $monthNum  = $d['month'];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F');
                $main[$monthName] = $d['profit'];
            } elseif ($d['category'] == "Sides"){
                $monthNum  = $d['month'];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F');
                $side[$monthName] = $d['profit'];
            } elseif ($d['category'] == "Beverages"){
                $monthNum  = $d['month'];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F');
                $beverage[$monthName] = $d['profit'];
            } elseif ($d['category'] == "Dessert"){
                $monthNum  = $d['month'];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F');
                $dessert[$monthName] = $d['profit'];
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert'));
    }

    public function revenueLastMonth()
    {
        $title = "Last Month";
        $result = DB::table('orders')
            ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
            ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
            ->select('menus.category', DB::raw("SUM(orders.subtotal) as profit"),  DB::raw("to_char(purchases.date::timestamp, 'W') as week"))
            ->whereMonth('purchases.date', date('m', strtotime('-1 month')))
            ->whereYear('purchases.date', Carbon::now()->year)
            ->groupby('week','menus.category')
            ->orderby('week')
            ->orderby('menus.category')
            ->get();
        $data = json_decode($result, true);
        $main = array(); $side = array(); $beverage = array(); $dessert = array();
        foreach ($data as $d){
            if ($d['category'] == "Main_Course"){
                $num = 'Week '.$d['week'];
                $main[$num] = $d['profit'];
            } elseif ($d['category'] == "Sides"){
                $num = 'Week '.$d['week'];
                $side[$num] = $d['profit'];
            } elseif ($d['category'] == "Beverages"){
                $num = 'Week '.$d['week'];
                $beverage[$num] = $d['profit'];
            } elseif ($d['category'] == "Dessert"){
                $num = 'Week '.$d['week'];
                $dessert[$num] = $d['profit'];
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert'));
    }

    public function revenueThisMonth()
    {
        $title = "This Month";
        $result = DB::table('orders')
            ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
            ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
            ->select('menus.category', DB::raw("SUM(orders.subtotal) as profit"),  DB::raw("to_char(purchases.date::timestamp, 'W') as week"))
            ->whereMonth('purchases.date', Carbon::now()->month)
            ->whereYear('purchases.date', Carbon::now()->year)
            ->groupby('week','menus.category')
            ->orderby('week')
            ->orderby('menus.category')
            ->get();
        $data = json_decode($result, true);
        $main = array(); $side = array(); $beverage = array(); $dessert = array();
        foreach ($data as $d){
            if ($d['category'] == "Main_Course"){
                $num = 'Week '.$d['week'];
                $main[$num] = $d['profit'];
            } elseif ($d['category'] == "Sides"){
                $num = 'Week '.$d['week'];
                $side[$num] = $d['profit'];
            } elseif ($d['category'] == "Beverages"){
                $num = 'Week '.$d['week'];
                $beverage[$num] = $d['profit'];
            } elseif ($d['category'] == "Dessert"){
                $num = 'Week '.$d['week'];
                $dessert[$num] = $d['profit'];
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert'));
    }

    public function revenuePast7Days()
    {
        $title = "Past 7 Days";
        $result = DB::table('orders')
            ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
            ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
            ->select('menus.category', 'purchases.date', DB::raw("SUM(orders.subtotal) as profit"))
            ->where('purchases.date', '>=', Carbon::now()->subDays(7))
            ->groupby('purchases.date','menus.category')
            ->orderby('purchases.date')
            ->orderby('menus.category')
            ->get();
        $data = json_decode($result, true);
        $main = array(); $side = array(); $beverage = array(); $dessert = array();
        foreach ($data as $d){
            if ($d['category'] == "Main_Course"){
                $main[$d['date']] = $d['profit'];
            } elseif ($d['category'] == "Sides"){
                $side[$d['date']] = $d['profit'];
            } elseif ($d['category'] == "Beverages"){
                $beverage[$d['date']] = $d['profit'];
            } elseif ($d['category'] == "Dessert"){
                $dessert[$d['date']] = $d['profit'];
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert'));
    }

    public function revenueCustomDate(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;
        $title = "From ". $start. " To ". $end;
        $result = DB::table('orders')
            ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
            ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
            ->select('menus.category', 'purchases.date', DB::raw("SUM(orders.subtotal) as profit"))
            ->where('purchases.date', '>=', $start)
            ->where('purchases.date', '<=', $end)
            ->groupby('purchases.date','menus.category')
            ->orderby('purchases.date')
            ->orderby('menus.category')
            ->get();
        $data = json_decode($result, true);
        $main = array(); $side = array(); $beverage = array(); $dessert = array();
        foreach ($data as $d){
            if ($d['category'] == "Main_Course"){
                $main[$d['date']] = $d['profit'];
            } elseif ($d['category'] == "Sides"){
                $side[$d['date']] = $d['profit'];
            } elseif ($d['category'] == "Beverages"){
                $beverage[$d['date']] = $d['profit'];
            } elseif ($d['category'] == "Dessert"){
                $dessert[$d['date']] = $d['profit'];
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert'));
    }
}
