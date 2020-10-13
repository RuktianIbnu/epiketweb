<?php

namespace App\Modules\Transaksi\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\transaksi\PendataanDrc;
use App\model\transaksi\Partner;

use PDF;
use DB;
use Hash;
use Image;
use File;
use Auth;
use Carbon\Carbon;


class PendataanDrcBaliController extends Controller
{
    public function index() {

        $userLevel  = Auth::user()->level_pengguna;
        $id_petugas = Auth::user()->nip;
        $count      = 0;

        if($userLevel == '5') {
            $rs     = PendataanDrcBali::select('*')
                    ->where('petugas_1',$id_petugas)
                    ->orwhere('petugas_2',$id_petugas)
                    ->paginate(10);

            return view('transaksi::PendataanDrcBali.index', ['rs' => $rs], ['level_pengguna'=>Auth::user()->level_pengguna]);
        }
        else{
            $rs = DB::table('pendataan_drc as a') 
                ->select('a.id', 'b.nama as petugas_1', 'a.tanggal', 'a.waktu', 'a.keterangan', DB::raw('select nama from users where nip = a.petugas_2) as petugas_2 FROM `pendataan_drc` as a left join users as b on a.petugas_1 = b.nip'))
                ->get();
            for ($i = 1; $i <= count($rs); $i++) {
                $count = $i;
            }

            return view('transaksi::PendataanDrcBali.index', ['rs' => $rs, 'count' => $count], ['level_pengguna'=>Auth::user()->level_pengguna]);
        }
    }

    public function page_add() {

        $userLevel  = Auth::user()->level_pengguna;
        
        $rs     =  DB::table('users')->select('nip', 'nama', DB::raw("CONCAT(nama) as display"))
                    ->get();               

            return view('transaksi::PendataanDrcBali.add', ['rs' => $rs]);
    }

    public function store(Request $request) {

        $path_kegiatan          = null;
        $id_petugas             = Auth::user()->nip;
        $forID                  = rand(1000,9999);

            $data                       = new PendataanDrc();
            $data->petugas_1            = $id_petugas;
            $data->petugas_2            = $request->petugas_2;
            $data->tanggal              = $request->tanggal;
            $data->waktu                = $request->waktu;
            $data->suhu_ruangan         = $request->suhu_ruangan;
            $data->ac_backup_1          = $request->ac_backup_1;
            $data->ac_backup_2          = $request->ac_backup_2;
            $data->ups_redudancy        = $request->ups_redudancy;
            $data->ups_load             = $request->ups_load;
            $data->ups_runtime          = $request->ups_runtime;
            $data->ups_temp             = $request->ups_temp;
            $data->ac_1                 = $request->ac_1;
            $data->ac_2                 = $request->ac_2;
            $data->ac_3                 = $request->ac_3;
            $data->keterangan           = $request->keterangan;
            $data->save();

            return response()->json(['status' => 'OK']);
    }

    public function page_show($id) {
        
        $rs             = PendataanDrc::findOrfail($id);
        $rsPartner      = DB::table('users')->select('nip', 'nama', DB::raw("CONCAT(nama) as display"))
                          ->get();

        //dd($rs);
        return view('transaksi::PendataanDrcBali.show', ['rs' => $rs, 'rsPartner' => $rsPartner]);
    }

    public function edit(Request $request) {
        $id                     = $request->id;
        $nip                    = Auth::user()->nip;
        $nip2                   = $request->petugas_2;
        $nip1                   = $request->nip;

        if ($nip != $nip1) {
            if ($nip != $nip2) {
                return response()->json( [ 'status' => 'Failed', 'message' => 'not_access' ] );
            }
        } 

        $data                       = PendataanDrc::find($id);
        $data->petugas_1            = $nip1;
        $data->petugas_2            = $request->petugas_2;
        $data->tanggal              = $request->tanggal;
        $data->waktu                = $request->waktu;
        $data->suhu_ruangan         = $request->suhu_ruangan;
        $data->ac_backup_1          = $request->ac_backup_1;
        $data->ac_backup_2          = $request->ac_backup_2;
        $data->ups_redudancy        = $request->ups_redudancy;
        $data->ups_load             = $request->ups_load;
        $data->ups_runtime          = $request->ups_runtime;
        $data->ups_temp             = $request->ups_temp;
        $data->ac_1                 = $request->ac_1;
        $data->ac_2                 = $request->ac_2;
        $data->ac_3                 = $request->ac_3;
        $data->keterangan           = $request->keterangan;

        $data->save();

        return response()->json(['status' => 'OK']);
    }

    public function delete($id) {

        $pendataan = PendataanDrc::findOrfail($id);
        $pendataan->delete();

        return response()->json(['status' => 'OK']);

    }
}
