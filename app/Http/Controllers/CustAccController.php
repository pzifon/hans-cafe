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
        return view('dashboard', compact('user'));
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
