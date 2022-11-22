<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function auth(Request $request){

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username',$username)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('name',$data->name);
                Session::put('nip',$data->nip);
                Session::put('id',$data->id);
                Session::put('login',TRUE);
                return redirect('/dashboard');
            }
            else{
                return redirect('/login')->with('alert','Password atau Username, Salah!');
            }
        }
        else{
            return redirect('/login')->with('alert','Password atau Username, Salah!');
        }
    }

    public function logout(Request $request){
        Session::flush();
        return redirect('/login');
    }
}
