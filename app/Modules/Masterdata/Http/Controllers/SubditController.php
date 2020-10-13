<?php

namespace App\Modules\Masterdata\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\masterdata\Subdirektorat;

use DB;
use Hash;
use Image;
use File;
use Auth;

class SubditController extends Controller
{
    public function index() {

        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {

            $rs     = Subdirektorat::select('id', 'kode_subdirektorat', 'nama_subdirektorat')
                        ->paginate(10);
            return view('masterdata::subdit.index', ['rs' => $rs]);
        } 
    }

	public function page_add() {

            return view('masterdata::subdit.add');
    }

    public function store(Request $request) {

		$subdit 					  = new Subdirektorat();
		$subdit->kode_subdirektorat   = $request->kode_subdirektorat;
		$subdit->nama_subdirektorat   = $request->nama_subdirektorat;
		$subdit->save();

		return response()->json(['status' => 'OK']);

	}

    public function page_show($id) {

        $userLogin  = Auth::user()->id;
        $userLevel  = Auth::user()->level_pengguna;
        $rsRole     = User::findOrfail($id)->level_pengguna;

        if($userLevel == '1') {
            
            $rs         = Subdirektorat::findOrfail($id);
        }
        
        return view('masterdata::subdit.show', ['rs' => $rs]);
    }

    public function edit(Request $request) {

        $user                       = Subdirektorat::find($request->id); 
        $user->kode_subdirektorat   = $request->kode_subdirektorat;
        $user->nama_subdirektorat   = $request->nama_subdirektorat;
        $user->save();

        return response()->json(['status' => 'OK']);
    }

    public function delete($id) {

        $subdit                   = Subdirektorat::findOrfail($id);
        $subdit->delete();

        return response()->json(['status' => 'OK']);

    }
}
