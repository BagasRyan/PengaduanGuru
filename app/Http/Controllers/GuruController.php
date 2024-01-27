<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function view(){
        //Ambil id_profesi di table USERS
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        $profesi = DB::table('users')->where('id', Auth::user()->id)->value('profesi');
        $id_profesi = DB::table('profesi')->where('nama_profesi', $profesi)->value('id');

        //query SIDEBAR
        $sidebar = DB::table('menu_sidebar')->where('profesi_id', $id_profesi)->get();
        
        return view('guru.view', compact('database', 'sidebar'));
    }
    
    public function create(){
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        $profesi = DB::table('users')->where('id', Auth::user()->id)->value('profesi');
        $id_profesi = DB::table('profesi')->where('nama_profesi', $profesi)->value('id');

        $sidebar = DB::table('menu_sidebar')->where('profesi_id', $id_profesi)->get();

        
        return view('guru.create', compact('database', 'sidebar'));
    }

    public function store(Request $request){

        DB::table('pengaduan')->insert([
            'id_guru' => Auth::user()->id,
            'isi_laporan' => $request->pengaduan
        ]);

        return redirect()->route('dashboard');
    }

    public function laporan(){
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        $profesi = DB::table('users')->where('id', Auth::user()->id)->value('profesi');
        $id_profesi = DB::table('profesi')->where('nama_profesi', $profesi)->value('id');

        $sidebar = DB::table('menu_sidebar')->where('profesi_id', $id_profesi)->get();

        $tanggapan = DB::table('tanggapan')->get();

        $pengaduan = DB::table('pengaduan')->where('id_guru', Auth::user()->id)->get();
        return view('guru.laporan', compact('database', 'sidebar', 'pengaduan', 'tanggapan'));
    }
}
