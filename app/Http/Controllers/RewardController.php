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

        return view('reward', compact('user', 'records'));
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

    public function viewCustReward($id)
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', $id)
            ->get();
        $records = DB::table('purchases')
            ->select('*')
            ->where('customer_id', $id)
            ->where('payment_status', true)
            ->where('claimed', false)
            ->count();
        return view('reward', compact('user', 'records'));
    }
    
}