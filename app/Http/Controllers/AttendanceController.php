<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $attendance = DB::table('attendance')
            ->join('users', 'attendance.id_user', '=', 'users.id')
            ->select('attendance.*', 'users.name', 'users.nip')
            ->orderBy('attendance.clock_in', 'asc')
            ->get();
            return view('attendance', ['attendance' => $attendance]);
        }
    }

    public function date(Request $request){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $attendance = DB::table('attendance')
            ->join('users', 'attendance.id_user', '=', 'users.id')
            ->select('attendance.*', 'users.name', 'users.nip')
            ->orderBy('attendance.clock_in', 'asc')
            ->whereDate('attendance.clock_in', '=', date($request->date))
            ->get();
            return view('attendance', ['attendance' => $attendance]);
        }
    }
}
