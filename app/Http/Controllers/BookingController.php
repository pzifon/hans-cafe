<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function insert(Request $request)
    {
        $user = DB::table('users')
            ->select('id', 'contact')
            ->where('id', Auth::id())
            ->get();
        $no_of_people = $request->input('no_of_people');
        $date = $request->input('res_date');
        $time = $request->input('time_slot');
        $user = $user->toArray();
        $user = (array)$user[0];
        $data = array('customer_id' => $user['id'], "contact" => $user['contact'], "date" => $date, "time_slot" => $time, 'no_of_people' => $no_of_people);
        DB::table('reservation')->insert($data);

        return redirect()->action('App\Http\Controllers\CustAccController@index')->with('success','Successfully booked a slot!');;
    }
}
