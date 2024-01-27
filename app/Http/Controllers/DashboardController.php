<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){

        //Ambil id_profesi di table USERS
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        $profesi = DB::table('users')->where('id', Auth::user()->id)->value('profesi');
        $id_profesi = DB::table('profesi')->where('nama_profesi', $profesi)->value('id');

        //query SIDEBAR
        $sidebar = DB::table('menu_sidebar')->where('profesi_id', $id_profesi)->get();

        //Isi content Beranda
        // $pengaduan = DB::table('pengaduan')->get();
        // $guru = DB::table('guru')->get();

        $sql = "SELECT pengaduan.id, guru.nama, pengaduan.isi_laporan, pengaduan.tanggal FROM pengaduan JOIN Guru ON guru.id = pengaduan.id_guru";
        $pengaduan = DB::select($sql);

        $tanggapan = DB::table('tanggapan')->get();


        return view('dashboard', compact('database', 'sidebar', 'pengaduan', 'tanggapan'));
    }

    
}
