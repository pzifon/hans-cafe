<?php

namespace App\Http\Controllers;

use App\Models\ClockIn;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ClockInController extends Controller
{
    public static function check()
    {
        $emp_id = Auth::id();
        $today = date("Y-m-d");
        
        //check existing record for the day
        $clockedIn = ClockIn::select('*')
                ->where('emp_id', '=', $emp_id)
                ->where('date', '=', $today)
                ->where('clock_out_time', '=', null)
                ->count();
        
        if ($clockedIn == 1){
            return true;
        }else {
            return false;
        }
    }

    public function clockIn()
    {
        $data = array("emp_id" => Auth::id(), "date" => date("Y-m-d"), "clock_in_time" => date("H:i:s"));
        DB::table('clockIn')->insert($data);
        return redirect()->back();
    }

    public function clockOut()
    {
        DB::table('clockIn')
              ->where('emp_id', Auth::id())
              ->where('date', '=', date("Y-m-d"))
              ->where('clock_out_time', '=', null)
              ->update(['clock_out_time' => date("H:i:s")]);
        return redirect()->back();
    }
} 