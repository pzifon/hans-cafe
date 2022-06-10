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
            ->where(function ($query) {
                $query->where('date', '>', date("Y-m-d"))
                    ->orWhere(function ($qry) {
                        $qry->where('date', '=', date("Y-m-d"))
                            ->Where('time_slot', '>=', date("H:i:s"));
                    });
            })
            ->orderBy('reservation.date')
            ->orderBy('reservation.time_slot')
            ->get();
        $past_res = DB::table('reservation')
            ->select('res_id', 'date', 'time_slot', 'no_of_people')
            ->where('customer_id', Auth::id())
            ->where(function ($query) {
                $query->where('date', '<', date("Y-m-d"))
                    ->orWhere(function ($qry) {
                        $qry->where('date', '=', date("Y-m-d"))
                            ->Where('time_slot', '<=', date("H:i:s"));
                    });
            })
            ->orderBy('reservation.date')
            ->orderBy('reservation.time_slot')
            ->limit(5)
            ->get();
        $reward = DB::table('purchases')
            ->select('*')
            ->where('customer_id', Auth::id())
            ->where('payment_status', true)
            ->where('claimed', false)
            ->count();
        if(Auth::user()->hasRole('admin')){
            return view('admin.dashboard', compact('user'));
        }elseif(Auth::user()->hasRole('employee')){
            return view('employee.dashboard', compact('user'));
        }elseif(Auth::user()->hasRole('customer')){
            return view('cust.dashboard', compact('user', 'total_purchases', 'reward', 'upcoming_res', 'past_res',));
        }
    }

    public function reviewInfo()
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', Auth::id())
            ->get();
        return view('cust.editaccount', compact('user'));
    }

    public function editCustInfo(Request $request)
    {   
        $dob = $request->input("dob");
        $email = $request->input('email');
        DB::table('users')
            ->where('id', Auth::id())
            ->update(['dob' => $dob,'email' => $email, "updated_at" => date("Y-m-d H:i:s")]);
        // echo "Sucessfully updated!";
        return redirect()->action('App\Http\Controllers\DashboardController@index')->with('success','Account info updated successfully!');;
    }

    public function custList(){
        $ids = DB::table('role_user')
            ->select('user_id')
            ->where('role_id',3)
            ->get()
            ->toArray();
        $id_list = array();
        foreach ($ids as $id) {
            array_push($id_list, $id->user_id);
        }
        $list = DB::table('users')
            ->select('id', 'name', 'email', 'contact')
            ->whereIn('id', $id_list)
            ->get();

        return view('customerinfo', compact('list'));
    }

    public function accManagement(){
        $emp_ids = DB::table('role_user')
            ->select('user_id')
            ->where('role_id',2)
            ->get()
            ->toArray();
        $emp_id_list = array();
        foreach ($emp_ids as $id) {
            array_push($emp_id_list, $id->user_id);
        }
        $emp_list = DB::table('users')
            ->select('id', 'name', 'email', 'contact')
            ->whereIn('id', $emp_id_list)
            ->get();

        $cust_ids = DB::table('role_user')
            ->select('user_id')
            ->where('role_id',3)
            ->get()
            ->toArray();
        $cust_id_list = array();
        foreach ($cust_ids as $id) {
            array_push($cust_id_list, $id->user_id);
        }
        $cust_list = DB::table('users')
            ->select('id', 'name', 'email', 'contact')
            ->whereIn('id', $cust_id_list)
            ->get();

        return view('admin/accmanagement', compact('cust_list', 'emp_list'));
    }

    public function viewCust($id){
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', $id)
            ->get();
        $total_purchases = DB::table('purchases')
                ->where('customer_id', $id)
                ->count();
        $upcoming_res = DB::table('reservation')
            ->select('res_id', 'date', 'time_slot', 'no_of_people')
            ->where('customer_id', $id)
            ->where(function ($query) {
                $query->where('date', '>', date("Y-m-d"))
                    ->orWhere(function ($qry) {
                        $qry->where('date', '=', date("Y-m-d"))
                            ->Where('time_slot', '>=', date("H:i:s"));
                    });
            })
            ->orderBy('reservation.date')
            ->orderBy('reservation.time_slot')
            ->get();
        $past_res = DB::table('reservation')
            ->select('res_id', 'date', 'time_slot', 'no_of_people')
            ->where('customer_id', $id)
            ->where(function ($query) {
                $query->where('date', '<', date("Y-m-d"))
                    ->orWhere(function ($qry) {
                        $qry->where('date', '=', date("Y-m-d"))
                            ->Where('time_slot', '<=', date("H:i:s"));
                    });
            })
            ->orderBy('reservation.date')
            ->orderBy('reservation.time_slot')
            ->limit(5)
            ->get();
        $reward = DB::table('purchases')
            ->select('*')
            ->where('customer_id', $id)
            ->where('payment_status', true)
            ->where('claimed', false)
            ->count();
            
        return view('cust.dashboard', compact('user', 'total_purchases', 'reward', 'upcoming_res', 'past_res',));
    }

    public function viewEmp($id){
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', $id)
            ->get();
        
        return view('employee.dashboard', compact('user'));
    }

    public function reviewEmpInfo($id)
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', $id)
            ->get();
        return view('admin.editEmp', compact('user'));
    }

    public function editEmpInfo(Request $request)
    {   
        $id = $request->input("id");
        $name = $request->input("name");
        $dob = $request->input("dob");
        $email = $request->input('email');
        $contact = $request->input("contact");
        DB::table('users')
            ->where('id', $id)
            ->update(['name' => $name, 'dob' => $dob,'email' => $email, 'contact' => $contact, "updated_at" => date("Y-m-d H:i:s")]);
        // echo "Sucessfully updated!";
        // return redirect()->action('App\Http\Controllers\DashboardController@viewEmp')->with('success','Employee Info updated successfully!');
        return redirect()->route('viewEmp', $id)->with('success','Employee Info updated successfully!');
    }
}