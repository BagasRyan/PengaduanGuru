<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KaprogController extends Controller
{
    public function view(){
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        $profesi = DB::table('users')->where('id', Auth::user()->id)->value('profesi');
        $id_profesi = DB::table('profesi')->where('nama_profesi', $profesi)->value('id');

        $sidebar = DB::table('menu_sidebar')->where('profesi_id', $id_profesi)->get();
        return view('kaprog.view', compact('database', 'sidebar'));
    }

    public function EditProfil(){
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('kaprog.profil.edit', compact('database'));
    }

    public function balas($id){
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        $profesi = DB::table('users')->where('id', Auth::user()->id)->value('profesi');
        $id_profesi = DB::table('profesi')->where('nama_profesi', $profesi)->value('id');

        $sidebar = DB::table('menu_sidebar')->where('profesi_id', $id_profesi)->get();

        $pengaduan = DB::table('pengaduan')->where('id', $id)->first();

        return view('kaprog.balas', compact('database', 'sidebar', 'pengaduan'));
    }

    public function store(Request $request){
        DB::table('tanggapan')->insert([
            'id_pengaduan' => $request->id,
            'id_kaprog' => Auth::user()->id,
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->route('dashboard');
    }
}
