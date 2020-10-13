<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userLogin          = Auth::user()->id;
        $userNip            = Auth::user()->nip;
        $user_level         = Auth::user()->level_pengguna;
        $countkunjungan     = 0;
        $countcheckin       = 0;
        $countcheckout      = 0;

        if ($user_level != 5){
            $countuser          = User::where('level_pengguna','5')->count();
            $pendataan          = DB::table('pendataan_tamu')
                                    ->select('*')
                                    ->get();
            $pendataanCheckin   = DB::table('pendataan_tamu')
                                    ->select('*')
                                    ->where('status', 'checkin')
                                    ->get();
            $pendataanCheckout   = DB::table('pendataan_tamu')
                                    ->select('*')
                                    ->where('status', 'checkout')
                                    ->get();

            $countcheckin       = count($pendataanCheckin);
            $countcheckout      = count($pendataanCheckout);
            $countkunjungan     = count($pendataan);

        } else {
            $countuser          = 0;
            $pendataanCheckin   = DB::table('pendataan_tamu')
                                    ->select('*')
                                    ->where('status', 'checkin')
                                    ->get();
            $pendataanCheckout   = DB::table('pendataan_tamu')
                                    ->select('*')
                                    ->where('status', 'checkout')
                                    ->get();

            $countcheckin       = count($pendataanCheckin);
            $countcheckout      = count($pendataanCheckout);
        }

        //if($user_level == '5') {
            $rs     = DB::table('pendataan_tamu as a')
                    ->select('a.*', 'd.kode_jenis', 'c.nama_ruang', 'b.nama as nama_petugas')
                    ->join('users as b', 'b.nip', 'a.id_petugas')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    //->where('a.id_petugas',$userNip)
                    ->where('a.status', 'checkin')
                    ->orderBy('a.created_at', 'DESC')
                    ->paginate(10);
        // }else {
        //     $rs     = DB::table('pendataan_tamu as a')
        //             ->select('a.*', 'd.kode_jenis', 'c.nama_ruang', 'b.nama as nama_petugas')
        //             ->join('users as b', 'b.nip', 'a.id_petugas')
        //             ->join('ruang as c', 'c.id', 'a.detail_lokasi')
        //             ->join('kegiatan as d', 'd.id', 'a.kategori')
        //             ->where('a.status', 'checkin')
        //             ->orderBy('a.created_at', 'DESC')
        //             ->paginate(10);
        // }

        return view('home', ['countcheckout'=> $countcheckout, 'countcheckin'=> $countcheckin, 'rs' => $rs, 'countuser'=> $countuser, 'countkunjungan'=> $countkunjungan]);
    }
}
