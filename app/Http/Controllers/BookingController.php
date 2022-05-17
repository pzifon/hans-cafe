<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(){
        $reservation = DB::table('reservation')
            ->join('users', 'reservation.customer_id', '=', 'users.id')
            ->select('reservation.res_id', 'reservation.date', 'reservation.time_slot', 'reservation.no_of_people', 'users.name', 'reservation.contact')
            ->where('reservation.date', '>=', date("Y-m-d"))
            ->orWhere(function ($query) {
                $query->where('reservation.date', '>=', date("Y-m-d"))
                        ->where('reservation.time_slot', '>=', date("H:i:s"));
            })
            ->orderBy('reservation.date')
            ->orderBy('reservation.time_slot')
            // ->orderBy(array('reservation.date'=>'asc', 'reservation.time_slot'=>'asc'))
            ->get();
        return view('reservation', compact('reservation'));
    }
    
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

        return redirect()->action('App\Http\Controllers\DashboardController@index')->with('success','Successfully booked a slot!');;
    }

    public function remove(Request $request)
    {
        $id = $request->input('res_id');
        DB::table('reservation')
            ->where('res_id',$id)
            ->delete();

        return redirect()->action('App\Http\Controllers\DashboardController@index')->with('success','Cancelled reservation!');;
    }
}
