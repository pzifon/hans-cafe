<?php

namespace App\Http\Controllers;

use DB;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PayrollController extends Controller
{
    public function index()
    {
        $employee = DB::table('pay_rate')
                ->join('users', 'pay_rate.emp_id', '=', 'users.id')
                ->select('users.id', 'users.name', 'pay_rate.position', 'pay_rate.hourly_rate')
                ->orderBy('id', 'ASC')
                ->get();

        $emp_ids = DB::table('role_user')
                ->select('user_id')
                ->where('role_id', 2)
                ->get()
                ->toArray();
        $emp_id_list = array();
        foreach ($emp_ids as $id) {
            array_push($emp_id_list, $id->user_id);
        }
        
        $working_hours = array();  
        foreach ($emp_id_list as $id){
            $data = DB::table("clockIn")
                    ->whereMonth('date', Carbon::now()->month) //04 = April, 05 = May
                    ->whereYear('date', Carbon::now()->year)
                    ->whereNotNull('clock_out_time')
                    ->where('emp_id', $id) 
                    ->get();
            $total_hours = 0;
            foreach ($data as $d){
                $start = strtotime($d->clock_in_time);
                $end = strtotime($d->clock_out_time);
                $difference = round(abs($end - $start) / 3600,0);
                $total_hours += $difference;
            }
            $arr = array('id' => $id, 'hours' => $total_hours);                
            array_push($working_hours, $arr);
            Debugbar::info('working_hours');
            Debugbar::info($working_hours);
        }

        return view('admin.payroll', compact('employee', 'working_hours'));
    }
    
    public function filter(Request $request)
    {
        $employee = DB::table('pay_rate')
                ->join('users', 'pay_rate.emp_id', '=', 'users.id')
                ->select('users.id', 'users.name', 'pay_rate.position', 'pay_rate.hourly_rate')
                ->orderBy('id', 'ASC')
                ->get();

        $emp_ids = DB::table('role_user')
                ->select('user_id')
                ->where('role_id', 2)
                ->get()
                ->toArray();
        $emp_id_list = array();
        foreach ($emp_ids as $id) {
            array_push($emp_id_list, $id->user_id);
        }
        
        $working_hours = array();  
        $filter = $request->input("month");
        $month = Carbon::parse($filter)->format('m');
        $year = Carbon::parse($filter)->format('Y');
        foreach ($emp_id_list as $id){
            $data = DB::table("clockIn")
                    ->whereMonth('date', $month) //04 = April, 05 = May
                    ->whereYear('date', $year)
                    ->where('emp_id', $id) 
                    ->get();
            $total_hours = 0;
            foreach ($data as $d){
                $start = strtotime($d->clock_in_time);
                $end = strtotime($d->clock_out_time);
                $difference = round(abs($end - $start) / 3600,0);
                $total_hours += $difference;
            }
            $arr = array('id' => $id, 'hours' => $total_hours);                
            array_push($working_hours, $arr);
            Debugbar::info('working_hours');
            Debugbar::info($working_hours);
        }

        return view('admin.payroll', compact('employee', 'working_hours'));
    }
}