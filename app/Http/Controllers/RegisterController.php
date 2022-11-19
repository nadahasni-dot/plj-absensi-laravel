<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }

    public function add(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required|unique:admin',
            'username' => 'required',
            'password' => 'min:6|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'min:6'
        ]);

        $hash_password = Hash::make($request->password);

        Admin::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'username' => $request->username,
            'password' => $hash_password,
        ]);

        return redirect('/login');
    }
}
