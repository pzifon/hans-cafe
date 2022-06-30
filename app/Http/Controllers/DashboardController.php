<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Debugbar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', Auth::id())
            ->get();
        
        if(Auth::user()->hasRole('admin')){
            $total_revenue = DB::table('purchases')
                ->whereMonth('date', "05") 
                ->whereYear('date', Carbon::now()->year)
                ->sum('total');
            $total_orders = DB::table('purchases')
                ->whereMonth('date', Carbon::now()->month) 
                ->whereYear('date', Carbon::now()->year)
                ->count();
            $peak = DB::table('purchases')->get();
            $week = array("Sun"=> 0, "Mon"=> 0, "Tue"=> 0, "Wed"=> 0, "Thu"=> 0, "Fri"=> 0, "Sat"=> 0);
            foreach ($peak as $p){
                $day = date('D', strtotime($p->date));
                if ($day == "Sun"){
                    $week["Sun"]++;
                }else if ($day == "Mon"){
                    $week["Mon"]++;
                }elseif ($day == "Tue"){
                    $week["Tue"]++;
                }elseif ($day == "Wed"){
                    $week["Wed"]++;
                }elseif ($day == "Thu"){
                    $week["Thu"]++;
                }elseif ($day == "Fri"){
                    $week["Fri"]++;
                }elseif ($day == "Sat"){
                    $week["Sat"]++;
                }
            }
            $order_category = DB::table('orders')
                ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
                ->select('menus.category', DB::raw("SUM(orders.quantity) as amount"))
                ->groupBy('menus.category')
                ->get();
            $res_time = DB::table('reservation')
                ->select('time_slot', DB::raw("count(res_id) as count"))
                ->groupBy('time_slot')
                ->get();
            $revenue_category = DB::table('orders')
            ->join('menus', 'orders.menu_code', '=', 'menus.menu_code')
            ->select('menus.category', DB::raw("SUM(orders.subtotal) as profit"))
            ->groupBy('menus.category')
            ->get();
            return view('admin.dashboard', compact('user', 'total_revenue', 'total_orders', 'week', 'order_category', 'res_time', 'revenue_category'));
        }elseif(Auth::user()->hasRole('employee')){
            $data = DB::table("clockIn")
                    ->whereMonth('date', Carbon::now()->month) //04 = April, 05 = May
                    ->whereYear('date', Carbon::now()->year)
                    ->whereNotNull('clock_out_time')
                    ->where('emp_id', Auth::id()) 
                    ->get();
            if ($data){
                $total_hours = 0;
                $total_days = 0;
                foreach ($data as $d){
                    $start = strtotime($d->clock_in_time);
                    $end = strtotime($d->clock_out_time);
                    $difference = round(abs($end - $start) / 3600,0);
                    $total_hours += $difference;
                    $total_days +=1 ;
                }
                return view('employee.dashboard', compact('user', 'total_hours', 'total_days'));
            }else {
                return view('employee.dashboard', compact('user'));
            }
        }elseif(Auth::user()->hasRole('customer')){
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
            $data = DB::table("clockIn")
            ->whereMonth('date', Carbon::now()->month) //04 = April, 05 = May
            ->whereYear('date', Carbon::now()->year)
            ->whereNotNull('clock_out_time')
            ->where('emp_id', Auth::id()) 
            ->get();
        $data = DB::table("clockIn")
            ->whereMonth('date', Carbon::now()->month) //04 = April, 05 = May
            ->whereYear('date', Carbon::now()->year)
            ->whereNotNull('clock_out_time')
            ->where('emp_id', Auth::id()) 
            ->get();
        if ($data){
            $total_hours = 0;
            $total_days = 0;
            foreach ($data as $d){
                $start = strtotime($d->clock_in_time);
                $end = strtotime($d->clock_out_time);
                $difference = round(abs($end - $start) / 3600,0);
                $total_hours += $difference;
                $total_days +=1 ;
            }
        }
        return view('employee.dashboard', compact('user', 'total_hours', 'total_days'));
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
        return redirect()->route('viewEmp', $id)->with('success','Employee Info updated successfully!');
    }

    public function addEmp(Request $request){
        $name = $request->input("name");
        $dob = $request->input("dob");
        $email = $request->input('email');
        $contact = $request->input('category');
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'contact' => ['required','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->role); 
        event(new Registered($user));

        return redirect()->action('App\Http\Controllers\DashboardController@accManagement')->with('success','Employee Added!');;
    }
}