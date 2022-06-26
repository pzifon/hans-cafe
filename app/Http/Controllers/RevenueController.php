<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use PdfReport;
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
        $main = array(); $side = array(); $beverage = array(); $dessert = array(); $category = array();
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
            if (!in_array($d['category'], $category)){
                array_push($category, $d['category']);
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert', 'category'));
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
        $main = array(); $side = array(); $beverage = array(); $dessert = array(); $category = array();
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
            if (!in_array($d['category'], $category)){
                array_push($category, $d['category']);
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert', 'category'));
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
        $main = array(); $side = array(); $beverage = array(); $dessert = array(); $category = array();
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
            if (!in_array($d['category'], $category)){
                array_push($category, $d['category']);
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert', 'category'));
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
        $main = array(); $side = array(); $beverage = array(); $dessert = array(); $category = array();
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
            if (!in_array($d['category'], $category)){
                array_push($category, $d['category']);
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert', 'category'));
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
        $main = array(); $side = array(); $beverage = array(); $dessert = array(); $category = array();
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
            if (!in_array($d['category'], $category)){
                array_push($category, $d['category']);
            }
        }
        return view('admin.revenue', compact('title', 'main', 'side', 'beverage', 'dessert', 'category'));
    }

public function salesReport(Request $request)
{
    $request = $request->title;
    if (strpos($request, "From") !== false){
        $array = explode(" ", $request);
        $start = $array[1];
        $end = $array[3];
    }

    $title = 'Sales Report for '. $request; // Report title

    $meta = [ // For displaying filters description on header
        'Sales For' => $request
    ];

    if ($request == "This Year"){
        $queryBuilder = DB::table('orders')
        ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
        ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
        ->select('purchases.date', 'menus.category', 'orders.menu_code', 'menus.name', 'orders.subtotal')
        ->whereYear('purchases.date', Carbon::now()->year)
        ->orderby('purchases.date')
        ->orderby('menus.category')
        ->get();
    }elseif ($request == "Last Month"){
        $queryBuilder = DB::table('orders')
        ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
        ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
        ->select('purchases.date', 'menus.category', 'orders.menu_code', 'menus.name', 'orders.subtotal')
        ->whereMonth('purchases.date', date('m', strtotime('-1 month')))
        ->whereYear('purchases.date', Carbon::now()->year)
        ->orderby('purchases.date')
        ->orderby('menus.category')
        ->get();
    }elseif ($request == "This Month"){
        $queryBuilder = DB::table('orders')
        ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
        ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
        ->select('purchases.date', 'menus.category', 'orders.menu_code', 'menus.name', 'orders.subtotal')
        ->whereMonth('purchases.date', Carbon::now()->month)
        ->whereYear('purchases.date', Carbon::now()->year)
        ->orderby('purchases.date')
        ->orderby('menus.category')
        ->get();
    }elseif ($request == "Past 7 Days"){
        $queryBuilder = DB::table('orders')
        ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
        ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
        ->select('purchases.date', 'menus.category', 'orders.menu_code', 'menus.name', 'orders.subtotal')
        ->where('purchases.date', '>=', Carbon::now()->subDays(7))
        ->orderby('purchases.date')
        ->orderby('menus.category')
        ->get();
    }else {
        $queryBuilder = DB::table('orders')
        ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
        ->join('purchases', 'purchases.id', '=' , 'orders.purchase_id')
        ->select('purchases.date', 'menus.category', 'orders.menu_code', 'menus.name', 'orders.subtotal')
        ->whereBetween('purchases.date', [$start, $end])
        ->groupby('purchases.date','menus.category', 'orders.menu_code', 'menus.name', 'orders.subtotal')
        ->orderby('purchases.date')
        ->orderby('menus.category')
        ->get();
    }

    $columns = [ // Set Column to be displayed
        'Date' => 'date',
        'Menu Category' => 'category', 
        'Item Code' => 'menu_code',
        'Item Name' => 'name',
        'Subtotal' => 'subtotal'
    ];

    // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
    return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->setPaper('a4')
                    ->editColumn('Date', [
                        'class' => 'left'
                    ])
                    ->editColumn('Subtotal', [ 
                        'class' => 'right bold'
                    ])
                    ->groupBy('Date')
                    ->showTotal([ // Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
                        'Subtotal' => 'RM' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                    ])
                    ->stream(); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
}
}
