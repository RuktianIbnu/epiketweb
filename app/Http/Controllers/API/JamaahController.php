<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\laporan\Jamaah;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;
use Storage;
use File;
use DB;
class JamaahController extends Controller
{
    public $successStatus = 200;
    
    public function store(Request $request) {
        /*return response()->json($request  );*/
    	$jamaah 						= new Jamaah();
    	$jamaah->no_paspor 				= $request->no_paspor;
    	$jamaah->nama 					= $request->nama;
    	$jamaah->tanggal_lahir 			= $request->tanggal_lahir;
    	$jamaah->tempat_lahir 			= $request->tempat_lahir;
    	$jamaah->warga_negara 			= $request->warga_negara;
    	$jamaah->jenis_kelamin 			= $request->jenis_kelamin;
    	$jamaah->tanggal_pengeluaran 	= $request->tanggal_pengeluaran;
    	$jamaah->tanggal_berlaku 		= $request->tanggal_berlaku;
    	$jamaah->tanggal_melintas 		= $request->tanggal_melintas;
    	$jamaah->kode_tpi 				= $request->kode_tpi;
    	$jamaah->kode_penerbangan 		= $request->kode_penerbangan;
    	$jamaah->nip 					= $request->nip;
    	$jamaah->keterangan 			= $request->keterangan;

        /*if (!$this->is_base64($request->image)) {
            return response()->json([
                'status' => 'Gagal', 
                'pesan' => 'Data image tidak dikenali, hanya base64 format yg didukung'
            ]);
        }*/

        $dir = public_path() . "/files/foto_jamaah/$request->no_paspor";
        if (!is_dir($dir)) {
            File::makeDirectory($dir, $mode = 0777, true, true);         
        }

        $image = Image::make(base64_decode($request->image))->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($dir . '/' . $request->no_paspor . '.jpg', 100)->encode('jpg');

        $path = 'files/foto_jamaah/' . $request->no_paspor . '/' . $request->no_paspor . '.jpg';

        /*$image_name = "image_jamaah_{$request->nama}" . time() . ".jpg";
        $path = 'files/foto_jamaah/' . time() . '/' . $image_name;
        $image = Image::make(base64_decode($request->image))->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');
        Storage::put($path, $image);*/

        /*$image = $request->image;  // your base64 encoded
        $image = str_replace('data:image/jpg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = str_random(10).'.'.'jpg';
        \File::put(storage_path(). '/' . $imageName, base64_decode($image));*/

        $jamaah->image = $path;

        if ($jamaah->save()) {
    		$status = true;
    		$pesan = 'Berhasil';
    	} else {
    		$status = false;
    		$pesan = 'Gagal';
    	}

    	return response()->json(['status' => $status, 'pesan' => $pesan]);
	}

    public function getDataPenerbangan(Request $request) {
        $kode_kantor    = Auth::user()->kode_kantor;
        $rs             = DB::table('ms_penerbangan')
                            ->select('kode_penerbangan', 'nama_penerbangan', DB::raw('CONCAT(kode_penerbangan, "-", nama_penerbangan) as display'))
                            ->where('kode_kantor', $kode_kantor)
                            ->get();


        $status = true;
        $pesan = 'sukses';

        $datas = $rs;

        return response()->json(['status' => $status, 'pesan' => $pesan,'datas' => $datas], $this->successStatus);
        
    }

    public function getDataJamaahByNip(Request $request) {
        $nip    = Auth::user()->nip;
        $rs     = Jamaah::where('nip', $nip)->get();


        $status = true;
        $pesan = 'sukses';

        $datas = $rs;

        return response()->json(['status' => $status, 'pesan' => $pesan,'datas' => $datas], $this->successStatus);
        
    }
}
