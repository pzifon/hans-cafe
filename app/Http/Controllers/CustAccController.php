<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CustAccController extends Controller
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
        return view('dashboard', compact('user', 'total_purchases', 'upcoming_res', 'past_res',));
    }

    public function viewinfo()
    {
        $user = DB::table('users')
            ->select('id', 'name', 'dob', 'email', 'contact', 'created_at')
            ->where('id', Auth::id())
            ->get();
        return view('editaccount', compact('user'));
    }

    public function editInfo(Request $request)
    {
        $email = $request->input('email');
        $contact = $request->input('contact');
        DB::table('users')
            ->where('id', Auth::id())
            ->update(['email' => $email, "contact" => $contact, "updated_at" => date("Y-m-d h:i:s")]);
        // echo "Sucessfully updated!";
        return redirect()->action('App\Http\Controllers\CustAccController@index')->with('success','Account info updated successfully!');;
    }
}
