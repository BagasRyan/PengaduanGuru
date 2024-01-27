<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginStore(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])){
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('gagal', 'Login Gagal!!, pastikan username dan password benar');
    }

    public function registerIndex(){
        $profesi = DB::table('profesi')->get();
        return view('auth.register', compact('profesi'));
    }

    public function register(Request $request){
        $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'telepon' => 'required',
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        $password = Hash::make($request->password);

        if($request->profesi == 'Guru'){
            $userId = DB::table('users')->insertGetId([
                'username' => $request->username,
                'password' => $password,
                'profesi' => $request->profesi
            ]);

            DB::table('guru')->insert([
                'id' => $userId,
                'nama' => $request->nama,
                'telepon' => $request->telepon
            ]);

        } else {
            $userId = DB::table('users')->insertGetId([
                'username' => $request->username,
                'password' => $password,
                'profesi' => $request->profesi
            ]);
            
            DB::table('kaprog')->insert([
                'id' => $userId,
                'nama' => $request->nama,
                'telepon' => $request->telepon
            ]);

        }

        return redirect()->route('login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}
