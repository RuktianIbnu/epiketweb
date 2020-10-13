<?php

namespace App\Modules\Transaksi\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\transaksi\Pendataan;

use PDF;
use DB;
use Hash;
use Image;
use File;
use Auth;
use Carbon\Carbon;


class PendataanController extends Controller
{

    public function cetak_pdf($id)
    {
        $id_petugas = Auth::user()->nip;
        
        $date       = \Carbon\Carbon::now()->timezone('Asia/Jakarta');
        $tanggal    = $date->format('d-m-Y');

        $rs         = DB::table('pendataan_tamu as a')
                    ->select('b.nama as nama_petugas','a.nama as nama', 'a.departement', 'd.kode_jenis', 'c.nama_ruang', 'a.lokasi', 'a.kategori', 'a.tanggal_mulai','a.lain_lain','a.deskripsi', 'a.jumlah', 'a.end_time', 'a.start_time', 'a.tanggal_selesai','a.efek','resiko','a.id_petugas','nip_petugas2')
                    ->join('users as b', 'a.id_petugas', 'b.nip')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    ->where('a.id',$id)
                    ->get()->first();

        $petugas2   = DB::table('pendataan_tamu as a')
                    ->select('b.nama as nama_petugas')
                    ->join('users as b', 'b.nip', 'a.nip_petugas2')
                    ->where('a.id',$id)
                    ->get()->first();
                    //dd($petugas2);
        $pdf = PDF::loadview('transaksi::pendataan.laporan', ['rs'=> $rs, 'petugas2'=> $petugas2, 'tanggal'=> $tanggal]);
        return $pdf->stream();
    }

    public function index() {

        $userLevel  = Auth::user()->level_pengguna;
        $id_petugas = Auth::user()->nip;

        //if($userLevel == '5') {
            $rs     = DB::table('pendataan_tamu as a')
                    ->select('a.*', 'd.kode_jenis', 'c.nama_ruang', 'b.nama as nama_petugas')
                    ->join('users as b', 'b.nip', 'a.id_petugas')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    //->where('a.id_petugas',$id_petugas)
                    ->where('a.status','checkout')
                    ->orderBy('a.updated_at', 'ASC')
                    ->paginate(10);

            return view('transaksi::pendataan.index', ['rs' => $rs], ['level_pengguna'=>Auth::user()->level_pengguna]);
        // }
        // else{
        //     $rs     = DB::table('pendataan_tamu as a')
        //             ->select('a.*', 'd.kode_jenis', 'c.nama_ruang', 'b.nama as nama_petugas')
        //             ->join('users as b', 'b.nip', 'a.id_petugas')
        //             ->join('ruang as c', 'c.id', 'a.detail_lokasi')
        //             ->join('kegiatan as d', 'd.id', 'a.kategori')
        //             ->where('a.status','checkout')
        //             ->orderBy('a.updated_at', 'ASC')
        //             ->paginate(10);
                      
        //     return view('transaksi::pendataan.index', ['rs' => $rs], ['level_pengguna'=>Auth::user()->level_pengguna]);
        // }
    }

    public function page_add() {

        $userLevel      = Auth::user()->level_pengguna;

        $rskegiatan     = DB::table('kegiatan')
                        ->select('id', 'kode_jenis', DB::raw("CONCAT(kode_jenis) as display"))
                            ->get();
        $rsruang        = DB::table('ruang')
                        ->select('id', 'nama_ruang', DB::raw("CONCAT(nama_ruang) as display"))
                            ->get();

            return view('transaksi::pendataan.addcheckin', ['rskegiatan' => $rskegiatan, 'rsruang' => $rsruang ]);

    }

    public function store(Request $request) {

        $id_petugas     = Auth::user()->nip;
        $date           = \Carbon\Carbon::now()->timezone('Asia/Jakarta');
        $tanggal        = $date->toDateString();
        $time           = $date->toTimeString();
        
            $data                       = new Pendataan();
            $data->nama                 = $request->nama;
            $data->departement          = $request->departement;
            $data->jumlah               = $request->jumlah;
            $data->lokasi               = $request->lokasi;
            $data->detail_lokasi        = $request->ruang;
            $data->tanggal_mulai        = $tanggal;
            $data->start_time           = $time;
            $data->kategori             = $request->kegiatan;;
            $data->status               = 'checkin';
            $data->id_petugas           = $id_petugas;

            $data->save();

            return response()->json(['status' => 'OK']);
    }

    public function page_show($id) {
        
        //$rs     = Pendataan::findOrfail($id);

        $rs     = DB::table('pendataan_tamu as a')
                    ->select('a.*', 'd.kode_jenis', 'c.nama_ruang', 'b.nama as nama_petugas')
                    ->join('users as b', 'b.nip', 'a.id_petugas')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    ->where('a.id',$id)
                    ->first();
                    //dd($rs);
        return view('transaksi::pendataan.show', ['rs' => $rs]);
    }

    public function edit(Request $request) {
        $path_pemberitahuan     = null;
        $path_perintah          = null;
        $path_kegiatan          = null;
        $path                   = null;
        $id                     = $request->id;
        $nip                    = Auth::user()->nip;
        $nama                   = Auth::user()->nama;
        $nip2                   = $request->nip;
        $filetype_pemberitahuan = '';
        $filetype_perintah      = '';
        $filetype               = '';
        $extends                = '';
        $data                   = Pendataan::find($id);
        $date                   = \Carbon\Carbon::now()->timezone('Asia/Jakarta');
        $tanggal                = $date->toDateString();
        $time                   = $date->toTimeString();

        if(!empty($request->file('photo_pemberitahuan'))){
             $dir = public_path() . "/files/foto_pemberitahuan/$nip2";
            if (!is_dir($dir)) {
                File::makeDirectory($dir, $mode = 0777, true, true);         
            }
            $filetype_pemberitahuan =$request->file('photo_pemberitahuan')->getClientOriginalExtension();
            $fileName = $nip2 .date('Ymd').rand(1000,9999);
            $request->file('photo_pemberitahuan')->move($dir, $fileName .'.'. $filetype_pemberitahuan);
            $path_pemberitahuan = 'files/foto_pemberitahuan/' . $nip2 . '/' . $fileName .'.'. $filetype_pemberitahuan;

            $data->type_pemberitahuan   = $filetype_pemberitahuan;
            $data->photo_pemberitahuan  = $path_pemberitahuan != null ? $path_pemberitahuan : null;
        }

        if(!empty($request->hasFile('photo_perintah'))){
             $dir = public_path() . "/files/foto_perintah/$nip2";
            if (!is_dir($dir)) {
                File::makeDirectory($dir, $mode = 0777, true, true);         
            }
            $filetype_perintah = $request->file('photo_perintah')->getClientOriginalExtension();
            $fileName = $nip2 .date('Ymd').rand(1000,9999);
            $request->file('photo_perintah')->move($dir, $fileName .'.'.$filetype_perintah);
            $path_perintah = 'files/foto_perintah/' . $nip2 . '/' . $fileName .'.'. $filetype_perintah;

            $data->photo_perintah       = $path_perintah != null ? $path_perintah : null; 
        }

        if(!empty($request->hasFile('photo_kegiatan'))){
            $dir = public_path() . "/files/foto_kegiatan/$nip2";
            if (!is_dir($dir)) {
                File::makeDirectory($dir, $mode = 0777, true, true);         
            }

            $filetype = $request->file('photo_kegiatan')->getClientOriginalExtension();
            $fileName = $nip2 .date('Ymd').rand(1000,9999);
            Image::make($request->file('photo_kegiatan'))->resize(150, 150)->save($dir . '/' . $fileName . '.jpg', 100);
            $path_kegiatan = 'files/foto_kegiatan/' . $nip2 . '/' . $fileName . '.jpg';

            $data->photo_kegiatan       = $path_kegiatan != null ? $path_kegiatan : null;
        }
        
        $data->tanggal_selesai      = $tanggal;
        $data->end_time             = $time;
        $data->deskripsi            = $request->deskripsi;
        $data->efek                 = $request->efek;
        $data->resiko               = $request->resiko;
        $data->status               = 'checkout';
        $data->nip_petugas2         = $nip;
        $data->nama_petugas2        = $nama;

        $data->save();

        return response()->json(['status' => 'OK']);
    }

    public function download_pemberitahuan($id){
       $model_file = Model::findOrFail($id); //Mencari model atau objek yang dicari
       $file = public_path() . $model_file->photo_pemberitahuan;//Mencari file dari model yang sudah dicari
       return response()->download($model_file->file_name); //Download file yang dicari berdasarkan nama file
    }

    public function download_perintah($id){
       $model_file = Model::findOrFail($id); //Mencari model atau objek yang dicari
       $file = public_path() . $model_file->photo_pemberitahuan;//Mencari file dari model yang sudah dicari
       return response()->download($model_file->file_name); //Download file yang dicari berdasarkan nama file
    }

    public function delete($id) {

        $pendataan                   = Pendataan::findOrfail($id);
        $pendataan->delete();

        return response()->json(['status' => 'OK']);

    }
}
