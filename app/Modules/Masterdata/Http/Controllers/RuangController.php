<?php

namespace App\Modules\Masterdata\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\Model\Masterdata\Ruang;

use DB;
use Hash;
use Image;
use File;
use Auth;

class RuangController extends Controller
{
    public function index() {

        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {

            $rs     = Ruang::select('id', 'nama_ruang', 'deskripsi')
                        ->paginate(10);
            return view('masterdata::ruang.index', ['rs' => $rs]);
        } 
    }

	public function page_add() {

            return view('masterdata::ruang.add');
    }

    public function store(Request $request) {

		$ruang 					= new Ruang();
		$ruang->nama_ruang       = $request->nama_ruang;
		$ruang->deskripsi     	= $request->deskripsi;
		$ruang->save();

		return response()->json(['status' => 'OK']);

	}

    public function page_show($id) {

        $userLogin  = Auth::user()->id;
        $userLevel  = Auth::user()->level_pengguna;
        
        if($userLevel == '1') {
            
            $rs         = Ruang::findOrfail($id);
        }
        //dd($userLevel, $rs);
        
        return view('masterdata::ruang.show', ['rs' => $rs]);
    }

    public function edit(Request $request) {

        $user                       = Ruang::find($request->id); 
        $user->nama_ruang           = $request->nama_ruang;
        $user->deskripsi       		= $request->deskripsi;
        $user->save();

        return response()->json(['status' => 'OK']);
    }

    public function delete($id) {

        $ruang                   = Ruang::findOrfail($id);
        $ruang->delete();

        return response()->json(['status' => 'OK']);

    }
}
