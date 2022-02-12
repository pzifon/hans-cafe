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
        $records = DB::table('reservation')
            ->select('res_id', 'date', 'time_slot', 'no_of_people')
            ->where('customer_id', Auth::id())
            ->where('cancelled', false)
            ->get();
        $total_purchases = DB::table('purchases')
            ->where('customer_id', Auth::id())
            ->count();
        return view('dashboard', compact('user', 'records', 'total_purchases'));
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
        $name = $request->input('name');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $contact = $request->input('contact');
        DB::table('users')
            ->where('id', Auth::id())
            ->update(['name' => $name, 'dob' => $dob, 'email' => $email, "contact" => $contact, "updated_at" => date("Y-m-d h:i:s")]);
        // echo "Sucessfully updated!";
        return redirect()->action('App\Http\Controllers\CustAccController@index')->with('success','Account info updated successfully!');;
    }
}
