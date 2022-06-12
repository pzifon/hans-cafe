<?php

namespace App\Http\Controllers;

use DB;
use Debugbar;
use Illuminate\Http\Request;

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
                ->whereMonth('date', "05") //04 = April, 05 = May
                ->where('emp_id', $id) //04 = April, 05 = May
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
