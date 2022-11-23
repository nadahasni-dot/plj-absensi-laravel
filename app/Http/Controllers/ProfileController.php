<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ProfileController extends Controller
{
    //
    public function index($id){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $admin = Admin::find($id);
            return view('profile', ['admin' => $admin]);
        }
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required',
            'username' => 'required'
        ]);

        $hash_password = Hash::make($request->password);
        
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->nip = $request->nip;
        $admin->username = $request->username;
        if($request->password!=null){
            $this->validate($request,[
                'password' => 'min:6|required_with:repeat_password|same:repeat_password',
                'repeat_password' => 'min:6'
            ]);
            $hash_password = Hash::make($request->password);
            $admin->password = $hash_password;
        }
        $admin->save();

        Session::put('username',$request->username);
        Session::put('name',$request->name);
        Session::put('nip',$request->nip);
        Session::put('id',$id);
        Session::put('login',TRUE);

        return redirect('/profile/'.$id);
    }
}
