<?php

namespace App\Modules\Masterdata\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\masterdata\Seksi;

use DB;
use Hash;
use Image;
use File;
use Auth;

class SeksiController extends Controller
{

    public function index() {

        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {

            $rs     = Seksi::select('id', 'kode_seksi', 'nama_seksi')
                        ->paginate(10);
            return view('masterdata::seksi.index', ['rs' => $rs]);
        } 
    }

	public function page_add() {

            $rs    = DB::table('subdit')->select('kode_subdirektorat', 'nama_subdirektorat', DB::raw("CONCAT(nama_subdirektorat) as display"))
                            ->get();

            return view('masterdata::seksi.add', ['rs' => $rs]);
    }

    public function store(Request $request) {

		$seksi 					      = new Seksi();
		$seksi->kode_seksi            = $request->kode_seksi;
		$seksi->nama_seksi            = $request->nama_seksi;
        $seksi->kode_subdirektorat    = $request->kode_subdirektorat;

		$seksi->save();

		return response()->json(['status' => 'OK']);

	}

    public function page_show($id) {

        $userLogin  = Auth::user()->id;
        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {
            $rssubdit   = DB::table('subdit')->select('kode_subdirektorat', 'nama_subdirektorat', DB::raw("CONCAT(nama_subdirektorat) as display"))
                            ->get();

            $rs         = Seksi::findOrfail($id);
        }
        else{
            abort(403);
        }

        return view('masterdata::seksi.show', ['rs' => $rs, 'rssubdit' => $rssubdit]);
    }

    public function edit(Request $request) {

        $user               = Seksi::find($request->id); 
        $user->kode_seksi   = $request->kode_seksi;
        $user->nama_seksi   = $request->nama_seksi;
        $user->save();

        return response()->json(['status' => 'OK']);
    }

    public function delete($id) {

        $seksi                   = Seksi::findOrfail($id);
        $seksi->delete();

        return response()->json(['status' => 'OK']);

    }
}
