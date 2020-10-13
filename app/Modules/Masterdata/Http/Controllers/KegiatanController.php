<?php

namespace App\Modules\Masterdata\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\masterdata\Kegiatan;

use DB;
use Hash;
use Image;
use File;
use Auth;

class KegiatanController extends Controller
{
    public function index() {

        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {

            $rs     = Kegiatan::select('id', 'kode_jenis', 'jenis_kegiatan')
                        ->paginate(10);
            return view('masterdata::kegiatan.index', ['rs' => $rs]);
        } 
    }

	public function page_add() {

            return view('masterdata::kegiatan.add');
    }

    public function store(Request $request) {

		$kegiatan 					  = new Kegiatan();
		$kegiatan->kode_jenis         = $request->kode_jenis;
		$kegiatan->jenis_kegiatan     = $request->jenis_kegiatan;
		$kegiatan->save();

		return response()->json(['status' => 'OK']);

	}

    public function page_show($id) {

        $userLogin  = Auth::user()->id;
        $userLevel  = Auth::user()->level_pengguna;
        
        if($userLevel == '1') {
            
            $rs         = Kegiatan::findOrfail($id);
        }
        //dd($userLevel, $rs);
        
        return view('masterdata::kegiatan.show', ['rs' => $rs]);
    }

    public function edit(Request $request) {

        $user                       = Kegiatan::find($request->id); 
        $user->kode_jenis           = $request->kode_jenis;
        $user->jenis_kegiatan       = $request->jenis_kegiatan;
        $user->save();

        return response()->json(['status' => 'OK']);
    }

    public function delete($id) {

        $kegiatan                   = Kegiatan::findOrfail($id);
        $kegiatan->delete();

        return response()->json(['status' => 'OK']);

    }
}
