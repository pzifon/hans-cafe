<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', Auth::id())
            ->get();
        $records = DB::table('purchases')
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
            return view('reward', compact('user', 'records'));
        }
    }

    public function claim(){
        $ids = DB::table('purchases')
            ->select('id')
            ->where('customer_id', Auth::id())
            ->where('payment_status',true)
            ->where('claimed',false)
            ->orderBy('id')
            ->limit(9)
            ->get()
            ->toArray();
        foreach ($ids as $id) {
            DB::table('purchases')
            ->where('id', $id->id)
            ->update(['claimed' => true]);
        }
        return redirect()->action('App\Http\Controllers\RewardController@index')->with('success','Reward Claimed!');
    
    }
    
}