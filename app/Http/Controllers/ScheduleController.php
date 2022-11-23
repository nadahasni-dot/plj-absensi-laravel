<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $schedule = Schedule::find(1);
            return view('schedule', ['schedule' => $schedule]);
        }
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'lat' => 'required',
            'lng' => 'required',
            'radius' => 'required',
            'office' => 'required',
            'clock_in' => 'required',
            'clock_in' => 'required',
        ]);
        
        $schedule = Schedule::find($id);
        $schedule->lat = $request->lat;
        $schedule->lng = $request->lng;
        $schedule->radius = $request->radius;
        $schedule->office = $request->office;
        $schedule->clock_in = $request->clock_in;
        $schedule->clock_out = $request->clock_out;
        $schedule->save();
        return redirect('/schedule');
    }
}
