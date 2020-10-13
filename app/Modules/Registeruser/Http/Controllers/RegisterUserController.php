<?php

namespace App\Modules\Registeruser\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;

use DB;
use Hash;
use Image;
use File;
use Auth;

class RegisterUserController extends Controller
{

    public function index() {

        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {

            $rs     =   DB::table('users as a')
                        ->select('a.id', 'a.nip', 'a.nama', 'a.no_hp', 'a.level_pengguna', 'b.nama_subdirektorat', 'c.nama_seksi')
                        ->leftjoin('subdit as b', 'a.kode_subdirektorat', 'b.kode_subdirektorat')
                        ->leftjoin('seksi as c', 'a.kode_seksi', 'c.kode_seksi')
                        ->where('aktif', 0)
                        ->paginate(10);

            return view('registeruser::registeruser.index', ['rs' => $rs]);
        } 
    }

    public function acc(Request $request) {
        
        $path       = null;
        $nip        = $request->nip;

        $user                   = User::find($request->id);
        $user->aktif            = 1;
        $user->save();

        return response()->json(['status' => 'OK']);
    }

    public function page_add() {

        $rs     = User::select('id', 'nip', 'no_hp', 'nama', 'level_pengguna')
                    ->where('aktif','0')
                    ->paginate(10);
        return view('registeruser::registeruser.add', ['rs' => $rs]);
    }

    public function store(Request $request) {

        $path       = null;
        $check      = User::where('nip', $request->nip)->first();

        if (!empty($check)) {
            return response()->json( [ 'status' => 'Failed', 'message' => 'Duplicate' ] );
        }

        $user                       = new User();
        $user->nip                  = $request->nip;
        $user->nama                 = $request->nama;
        $user->no_hp                = $request->no_hp;
        $user->kode_subdirektorat   = $request->kode_subdirektorat;
        $user->kode_seksi           = $request->kode_seksi;
        $user->password             = Hash::make($request->password);
        $user->level_pengguna       = $request->level_pengguna;
        $user->aktif                = 0;
        $user->save();

        switch ($request->level_pengguna) {
            case 1:
                $role = 'SUPERADMIN';
            break;

            case 2:
                $role = 'DIREKTUR';
            break;

            case 3:
                $role = 'KASUBDIT';
            break;
            case 4:
                $role = 'KASI';
            break;
            case 5:
                $role = 'PETUGAS';
            break;
        }

        $user->assignRole($role);

        return response()->json(['status' => 'OK']);

    }

    public function delete($id) {

        $user = User::findOrfail($id);
        $user->delete();

        return response()->json(['status' => 'OK']);

    }
}
