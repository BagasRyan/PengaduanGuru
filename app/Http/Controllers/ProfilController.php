<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index(){
        $database = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('guru.profil.edit', compact('database'));
    }
}
