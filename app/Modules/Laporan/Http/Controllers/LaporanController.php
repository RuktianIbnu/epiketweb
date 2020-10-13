<?php

namespace App\Modules\Laporan\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\laporan\laporan;

use Dompdf\Dompdf;
use PDF;
use DB;
use Hash;
use Image;
use File;
use Excel;
use Auth;
use Carbon\Carbon;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{

	public function index() {

        $lokasi             = null;
        $departement        = null;
        $kategori           = null;
        $nama_petugas       = null;
        $tanggal_mulai      = null;
        $tanggal_selesai    = null;

        $userLevel  = Auth::user()->level_pengguna;
        $id_petugas = Auth::user()->nip;

        $rs         = DB::table('pendataan_tamu as a')
                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                    ->join('users as b', 'a.id_petugas', 'b.nip')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    ->paginate(10);

        $rskegiatan     = DB::table('kegiatan')
                        ->select('id', 'kode_jenis', DB::raw("CONCAT(kode_jenis) as display"))
                        ->get();

        return view('laporan::laporan_pendataan.index', ['rs' => $rs, 'rskegiatan' => $rskegiatan, 'lokasi' => $lokasi, 'departement' => $departement, 'kategori' => $kategori, 'nama_petugas' => $nama_petugas, 'tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);
    }

	public function export_excel(Request $request)
	{
		$data = null;
    	$lokasi  			= $request->cari_lokasi;
        $departement  		= $request->cari_departement;
        $kategori 			= $request->cari_kategori;
        $nama_petugas  		= $request->cari_nama_petugas;
        $tanggal_mulai  	= $request->cari_tanggal_mulai;
        $tanggal_selesai	= $request->cari_tanggal_selesai;
        $date 				= date('dd-mm-YYYY');

        if($request->has('cari_lokasi') || $request->has('cari_departement') || $request->has('cari_kategori') || $request->has('cari_nama_petugas') 
        	|| $request->has('cari_tanggal_mulai')){

        	if($tanggal_mulai != null && $tanggal_selesai != null){
            	$data     = DB::table('pendataan_tamu as a')
                        ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                        ->join('users as b', 'b.nip', 'a.id_petugas')
                        ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                        ->join('kegiatan as d', 'd.id', 'a.kategori')
                        ->where('a.lokasi','like',"%".$lokasi."%")
                        ->where('a.departement','like',"%".$departement."%")
                        ->where('a.kategori','like',"%".$kategori."%")
                        ->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                        ->where(function ($query) use ($nama_petugas) {
                               $query->where('b.nama','like',"%".$nama_petugas."%")
                                     ->orWhere('a.nama_petugas2','like',"%".$nama_petugas."%");
                           })
                        ->get();
            }
            else{
            	$data     = DB::table('pendataan_tamu as a')
                        ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                        ->join('users as b', 'b.nip', 'a.id_petugas')
                        ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                        ->join('kegiatan as d', 'd.id', 'a.kategori')
                        ->where('a.lokasi','like',"%".$lokasi."%")
                        ->where('a.departement','like',"%".$departement."%")
                        ->where('a.kategori','like',"%".$kategori."%")
                        //->where('b.nama','like',"%".$nama_petugas."%")
                        ->where(function ($query) use ($nama_petugas) {
                               $query->where('b.nama','like',"%".$nama_petugas."%")
                                     ->orWhere('a.nama_petugas2','like',"%".$nama_petugas."%");
                           })
                        ->get();
            }
            return Excel::download(new LaporanExport($data), "Laporan pendataan" .'.xlsx'); 
            //dd($data);
         	// return Excel::create("Laporan Pendataan Tamu". '_' .date('Ymd').rand(1000, 9999), function ($excel) use ($data) {
          //   $excel->sheet('New sheet', function ($sheet) use ($data) {
          //       $sheet->loadView('laporan::lap_pendataan', ['data' => $data]);
          //       $sheet->setWidth([
          //           'A' => 5, 'B' => 20, 'C' => 20, 'D' => 20, 'E' => 20, 'F' => 35, 'G' => 35, 'H' => 40, 'I' => 40, 'J' => 40, 'K' => 20,
          //       ]);
          //       $sheet->setFreeze('A6');
            
          // });
          //   $lastrow = $excel->getActiveSheet()->getHighestRow();  
          //   $excel->getActiveSheet()->getStyle('A1:D'.$lastrow)->getAlignment()->setWrapText(true);
          //   })->export('xls');

        }else{
	        $data     = DB::table('pendataan_tamu as a')
                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                    ->join('users as b', 'a.id_petugas', 'b.nip')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    ->where('a.status','checkout')
                    ->orderBy('a.tanggal_selesai', 'ASC')
                    ->paginate(10);

			 return Excel::download(new LaporanExport($data), "Laporan pendataan" .'.xlsx');
        }
	}

	// public function export_excel(Request $request) {
 //        $data     = DB::table('pendataan_tamu as a')
 //                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
 //                    ->join('users as b', 'a.id_petugas', 'b.nip')
 //                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
 //                    ->join('kegiatan as d', 'd.id', 'a.kategori')
 //                    ->where('a.status','checkout')
 //                    ->orderBy('a.tanggal_selesai', 'ASC')
 //                    ->paginate(10);

 //            return Excel::download(new LaporanExport($data), "Laporan pendataan" .'.xlsx');
 //    }

	public function cetak_pdf(Request $request)
    {
    	$lokasi  			= $request->cari_lokasi;
        $departement  		= $request->cari_departement;
        $kategori 			= $request->cari_kategori;
        $nama_petugas  		= $request->cari_nama_petugas;
        $tanggal_mulai  	= $request->cari_tanggal_mulai;
        $tanggal_selesai	= $request->cari_tanggal_selesai;
        $date 				= date('dd-mm-YYYY');

        $rskegiatan     = DB::table('kegiatan')
                        ->select('id', 'kode_jenis', DB::raw("CONCAT(kode_jenis) as display"))
                        ->get();

        if($request->has('cari_lokasi') || $request->has('cari_departement') || $request->has('cari_kategori') || $request->has('cari_nama_petugas') 
        	|| $request->has('cari_tanggal_mulai')){

        	if($tanggal_mulai != null && $tanggal_selesai != null){
            	$rs     = DB::table('pendataan_tamu as a')
                        ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                        ->join('users as b', 'b.nip', 'a.id_petugas')
                        ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                        ->join('kegiatan as d', 'd.id', 'a.kategori')
                        ->where('a.lokasi','like',"%".$lokasi."%")
                        ->where('a.departement','like',"%".$departement."%")
                        ->where('a.kategori','like',"%".$kategori."%")
                        ->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                        ->where(function ($query) use ($nama_petugas) {
                               $query->where('b.nama','like',"%".$nama_petugas."%")
                                     ->orWhere('a.nama_petugas2','like',"%".$nama_petugas."%");
                           })
                        ->get();
            }
            else{
            	$rs     = DB::table('pendataan_tamu as a')
                        ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                        ->join('users as b', 'b.nip', 'a.id_petugas')
                        ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                        ->join('kegiatan as d', 'd.id', 'a.kategori')
                        ->where('a.lokasi','like',"%".$lokasi."%")
                        ->where('a.departement','like',"%".$departement."%")
                        ->where('a.kategori','like',"%".$kategori."%")
                        //->where('b.nama','like',"%".$nama_petugas."%")
                        ->where(function ($query) use ($nama_petugas) {
                               $query->where('b.nama','like',"%".$nama_petugas."%")
                                     ->orWhere('a.nama_petugas2','like',"%".$nama_petugas."%");
                           })
                        ->get();
            }
            //dd($rs);
	        $pdf = PDF::loadview('laporan::laporan_pendataan.pdf', ['rs'=> $rs, 'rskegiatan' => $rskegiatan], [], ['orientation' => 'L', 'format' => 'A4-L', 'default_font' => 'arial']);
	    	return $pdf->stream('laporan_pendataan-'.$date.rand(1000, 9999).'.pdf');

        }else{
	        $rs     = DB::table('pendataan_tamu as a')
                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                    ->join('users as b', 'a.id_petugas', 'b.nip')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    ->where('a.status','checkout')
                    ->orderBy('a.tanggal_selesai', 'ASC')
                    ->paginate(10);
            //dd($rs);
			$pdf = PDF::loadview('laporan::laporan_pendataan.pdf', ['rs'=> $rs, 'rskegiatan' => $rskegiatan], [], ['orientation' => 'L', 'format' => 'A4-L', 'default_font' => 'arial']);
	        return $pdf->stream('laporan_pendataan-'.$date.rand(1000, 9999).'.pdf');
        }
    }

    public function search(Request $request) {
        $lokasi  			= $request->cari_lokasi;
        $departement  		= $request->cari_departement;
        $kategori 			= $request->cari_kegiatan;
        $nama_petugas       = $request->cari_nama_petugas;
        $tanggal_mulai  	= $request->cari_tanggal_mulai;
    	$tanggal_selesai	= $request->cari_tanggal_selesai;
        //dd($kategori);
        $rskegiatan     = DB::table('kegiatan')
                        ->select('id', 'kode_jenis', DB::raw("CONCAT(kode_jenis) as display"))
                        ->get();
           
        if($request->has('cari_lokasi') || $request->has('cari_departement') || $request->has('cari_kategori') || $request->has('cari_nama_petugas') 
        	|| $request->has('cari_tanggal_mulai')){

                if($tanggal_mulai != null && $tanggal_selesai != null){
                	$rs     = DB::table('pendataan_tamu as a')
	                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
	                    ->join('users as b', 'b.nip', 'a.id_petugas')
                        ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                        ->join('kegiatan as d', 'd.id', 'a.kategori')
	                    ->where('a.lokasi','like',"%".$lokasi."%")
	                    ->where('a.departement','like',"%".$departement."%")
	                    ->where('a.kategori','like',"%".$kategori."%")
	                    ->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
	                    ->where(function ($query) use ($nama_petugas) {
                               $query->where('b.nama','like',"%".$nama_petugas."%")
                                     ->orWhere('a.nama_petugas2','like',"%".$nama_petugas."%");
                           })
                        ->orderBy('a.tanggal_selesai', 'ASC')
                        ->paginate(10);
                }
                else{
                    
                	$rs = DB::table('pendataan_tamu as a')
	                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
	                    ->join('users as b', 'b.nip', 'a.id_petugas')
                        ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                        ->join('kegiatan as d', 'd.id', 'a.kategori')
	                    ->where('a.lokasi','like',"%".$lokasi."%")
	                    ->where('a.departement','like',"%".$departement."%")
	                    ->where('a.kategori','like',"%".$kategori."%")
                        //->where('b.nama','like',"%".$nama_petugas."%")
                        ->where(function ($query) use ($nama_petugas) {
                               $query->where('b.nama','like',"%".$nama_petugas."%")
                                     ->orWhere('a.nama_petugas2','like',"%".$nama_petugas."%");
                           })
                        ->orderBy('a.tanggal_selesai', 'ASC')
                        ->paginate(10);
                }
	                    //dd($rs);
            
            return view('laporan::laporan_pendataan.index', ['rs' => $rs, 'rskegiatan' => $rskegiatan, 'lokasi' => $lokasi, 'departement' => $departement, 'kategori' => $kategori, 'nama_petugas' => $nama_petugas, 'tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);

        }else{
	        $rs     = DB::table('pendataan_tamu as a')
                    ->select('a.*','b.nama as nama_petugas','a.nama as nama_tamu', 'd.kode_jenis', 'c.nama_ruang')
                    ->join('users as b', 'a.id_petugas', 'b.nip')
                    ->join('ruang as c', 'c.id', 'a.detail_lokasi')
                    ->join('kegiatan as d', 'd.id', 'a.kategori')
                    ->where('a.status','checkout')
                    ->orderBy('a.tanggal_selesai', 'ASC')
                    ->paginate(10);

            
            return view('laporan::laporan_pendataan.index', ['rs' => $rs, 'rskegiatan' => $rskegiatan, 'lokasi' => $lokasi, 'departement' => $departement, 'kategori' => $kategori, 'nama_petugas' => $nama_petugas, 'tanggal_mulai' => $tanggal_mulai, 'tanggal_selesai' => $tanggal_selesai]);
        }
    }

}