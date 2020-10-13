<?php

namespace App\Modules\Masterdata\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\model\masterdata\UsersTPI;

use DB;
use Hash;
use Image;
use File;
use Auth;

class PetugasController extends Controller
{
    public function index() {

        $userLevel  = Auth::user()->level_pengguna;

        if($userLevel == '1') {

            $rs     =   DB::table('users as a')
                        ->select('a.id', 'a.nip', 'a.nama', 'a.no_hp', 'a.level_pengguna', 'b.nama_subdirektorat', 'c.nama_seksi')
                        ->leftjoin('subdit as b', 'a.kode_subdirektorat', 'b.kode_subdirektorat')
                        ->leftjoin('seksi as c', 'a.kode_seksi', 'c.kode_seksi')
                        ->where('a.aktif', '1')
                        ->paginate(10);

                        //dd($rs);
            return view('masterdata::petugas.index', ['rs' => $rs]);
        } 
    }

	public function page_add() {

        $userLogin  = Auth::user()->id;
        $userLevel  = Auth::user()->level_pengguna;
        
        if ($userLevel == '1') {
            $rslevel    = DB::table('roles')->select('id', 'name', DB::raw("CONCAT(name) as display"))
                            ->get();

            $rssubdit    = DB::table('subdit')->select('kode_subdirektorat', 'nama_subdirektorat', DB::raw("CONCAT(nama_subdirektorat) as display"))
                            ->get();

            $rsseksi    = DB::table('seksi')->select('kode_seksi', 'nama_seksi', DB::raw("CONCAT(nama_seksi) as display"))
                            ->get();

                            //dd($rsseksi);

            return view('masterdata::petugas.add', ['resultslevel' => $rslevel, 'rssubdit' => $rssubdit, 'rsseksi' => $rsseksi]);

        }
    }

    public function store(Request $request) {

		$path 		= null;
		$check 		= User::where('nip', $request->nip)->first();
        $fromAdmin  = $request->from_admin;
		if (!empty($check)) {
			return response()->json( [ 'status' => 'Failed', 'message' => 'Duplicate' ] );
		}

		if ($request->hasFile('photo')) {
			$dir = public_path() . "/files/foto_petugas/$request->nip";
			if (!is_dir($dir)) {
				File::makeDirectory($dir, $mode = 0777, true, true);         
			}
			Image::make($request->file('photo'))->resize(150, 150)->save($dir . '/' . $request->nip . '.jpg', 100);
			$path = 'files/foto_petugas/' . $request->nip . '/' . $request->nip . '.jpg';
		}

		$user 					= new User();
        if($fromAdmin == "1"){
            $user->aktif = "1";
        }
        else{
            $user->aktif = "0";
        }
		$user->nip 				= $request->nip;
		$user->nama 			= $request->nama;
        $user->no_hp            = $request->no_hp;        
		$user->password 		= Hash::make($request->password);
        $user->level_pengguna   = $request->level_pengguna;
		$user->photo 			= $path != null ? $path : null; 
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

    public function page_show($id) {

        $userLogin  = Auth::user()->id;
        $userLevel  = Auth::user()->level_pengguna;
        $rsRole     = User::findOrfail($id)->level_pengguna;

        if($userLevel == '1') {

                $rs         = User::findOrfail($id);
                $rslevel    = Role::select('id', 'name', DB::raw("CONCAT(name) as display"))
                                ->get();

                $rssubdit   = DB::table('subdit')->select('kode_subdirektorat', 'nama_subdirektorat', DB::raw("CONCAT(nama_subdirektorat) as display"))
                            ->get();

                $rsseksi   = DB::table('seksi')->select('kode_seksi', 'nama_seksi', DB::raw("CONCAT(nama_seksi) as display"))
                            ->get();

                return view('masterdata::petugas.show', ['rs' => $rs, 'rslevel' => $rslevel, 'rssubdit' => $rssubdit, 'rsseksi' => $rsseksi]);
        }
    }

    public function edit(Request $request) {
        
        $path       = null;
        $nip        = $request->nip;

        $oldnip     = User::where('id', $request->id)->first();
        $niplama    = $oldnip->nip;

        if ($niplama != $nip) {
            $check  = User::where('nip', $request->nip)->first();

            if (!empty($check)) {
                return response()->json( [ 'status' => 'Failed', 'message' => 'Duplicate' ] );
            }
        } 

        if ($request->hasFile('photo')) {
            $dir = public_path() . "/files/foto_petugas/$request->nip";
            if (!is_dir($dir)) {
                File::makeDirectory($dir, $mode = 0777, true, true);         
            }
            Image::make($request->file('photo'))->resize(150, 150)->save($dir . '/' . $request->nip . '.jpg', 100);
            $path = 'files/foto_petugas/' . $request->nip . '/' . $request->nip . '.jpg';
        }

        $user                       = User::find($request->id);
        $path                       = $user->photo != null && $path == null ? $user->photo : $path; 
        $user->nip                  = $request->nip;
        $user->nama                 = $request->nama;
        $user->no_hp                = $request->no_hp;
        $user->aktif                = '1';
        $user->level_pengguna       = $request->level_pengguna;
        $user->kode_subdirektorat   = $request->kode_subdirektorat;
        $user->kode_seksi           = $request->kode_seksi;
        $user->photo                = $path != null ? $path : null;
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

        $user->syncRoles([$role]);

        return response()->json(['status' => 'OK']);
    }

    public function changePassword(Request $request) {

        if (!(Hash::check($request->sandi_lama, Auth::user()->password))) {
            return response()->json(['status' => 'Failed', 'message' => 'Kata sandi lama tidak cocok']);
        }
 
        if(strcmp($request->sandi_baru, $request->sandi_lama) == 0){
            return response()->json(['status' => 'Failed', 'message' => 'Kata sandi baru tidak boleh sama dengan kata sandi lama']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->sandi_baru);
        $user->save();
        return response()->json(['status' => 'OK']);
    }
}
