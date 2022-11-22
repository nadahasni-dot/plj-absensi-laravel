<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $pegawai = DB::table('users')->get();
            return view('pegawai',['pegawai' => $pegawai]);
        }
    }

    public function tambah(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('pegawai_tambah');
        }
    }

    public function add(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required',
            'password' => 'min:6|required',
        ]);

        $hash_password = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $hash_password,
        ]);

        return redirect('/pegawai');
    }

    public function edit($id){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $pegawai = User::find($id);
            return view('pegawai_edit', ['pegawai' => $pegawai]);
        }
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required'
        ]);
        
        $pegawai = User::find($id);
        $pegawai->name = $request->name;
        $pegawai->nip = $request->nip;
        $pegawai->email = $request->email;
        if($request->password!=null){
            $hash_password = Hash::make($request->password);
            $pegawai->password = $hash_password;
        }
        $pegawai->save();
        return redirect('/pegawai');
    }

    public function delete($id){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            $pegawai = User::where('id', $id);
            $pegawai->delete();
            return redirect('/pegawai');
        }
    }
}
