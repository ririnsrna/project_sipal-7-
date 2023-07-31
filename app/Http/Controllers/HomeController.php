<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // $jumlah = 0;
        $user = DB::table('member')->count();
        $peminjam = DB::table('peminjaman')->where('keadaan', '=', 'Belum Dikembalikan')->count();
        $alat = DB::table('alat')->get();
        $tot_alat = DB::table('alat')->count();
        return view('home', ['var_user' => $user, 'var_peminjam' => $peminjam, 'var_alat' => $alat, 'var_tot' => $tot_alat]);
    }
}
