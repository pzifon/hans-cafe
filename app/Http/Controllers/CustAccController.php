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
        log:info($user);
        return view('dashboard', compact('user'));
    }
}
