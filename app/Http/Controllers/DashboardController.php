<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', Auth::id())
            ->get();
        $total_purchases = DB::table('purchases')
                ->where('customer_id', Auth::id())
                ->count();
        $upcoming_res = DB::table('reservation')
            ->select('res_id', 'date', 'time_slot', 'no_of_people')
            ->where('customer_id', Auth::id())
            ->where('date', '>', date("Y-m-d"))
            ->get();
        $past_res = DB::table('reservation')
            ->select('res_id', 'date', 'time_slot', 'no_of_people')
            ->where('customer_id', Auth::id())
            ->where('date', '<', date("Y-m-d"))
            ->get();

        if(Auth::user()->hasRole('admin')){
            return view('admin.dashboard', compact('user'));
        }elseif(Auth::user()->hasRole('employee')){
            return view('employee.dashboard', compact('user'));
        }elseif(Auth::user()->hasRole('customer')){
            return view('cust.dashboard', compact('user', 'total_purchases', 'upcoming_res', 'past_res',));
        }
    }

    public function viewCustinfo()
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', Auth::id())
            ->get();
        return view('cust.editaccount', compact('user'));
    }

    public function editCustInfo(Request $request)
    {
        $email = $request->input('email');
        DB::table('users')
            ->where('id', Auth::id())
            ->update(['email' => $email, "updated_at" => date("Y-m-d h:i:s")]);
        // echo "Sucessfully updated!";
        return redirect()->action('App\Http\Controllers\DashboardController@index')->with('success','Account info updated successfully!');;
    }
}