<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\model\masterdata\Subdirektorat;

class UserController extends Controller
{

    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['nip' => request('nip'), 'password' => request('password')])){
            $user           = Auth::user();
            $usersubdit     = Auth::user()->kode_subdirektorat;
            $rs             = Subdirektorat::select('ms_subdirektorat.id', 'ms_subdirektorat.kode_subdirektorat', 'nama_subdirektorat')
                                ->join('users', 'ms_subdirektorat.kode_subdirektorat', 'users.kode_subdirektorat') 
                                ->where('ms_subdirektorat.kode_subdirektorat', $usersubdit)     
                                ->first();

            $token =  $user->createToken('nApp')->accessToken;
            $status = true;
            $pesan = 'Login Berhasil!';

            $datas['nip'] =  $user->nip;
            $datas['nama'] =  $user->nama;
            $datas['kode_subdirektorat'] =  $user->kode_subdirektorat;
            $datas['nama_subdirektorat'] =  $rs->nama_subdirektorat;
            
            return response()->json(['token' => $token, 'status' => $status, 'pesan' => $pesan,'datas' => $datas], $this->successStatus);
        }
        else{

            $error['status'] =  false;
            $pesan = 'Login Gagal!';
            return response()->json(['error'=> $error, 'pesan' => $pesan], 401);

        }
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function cek() {
        // get logged-in user
        $user = auth()->user();
        $user->givePermissionTo('Melihat daftar pendataan');

        // get all inherited permissions for that user
        $permissions = $user->getAllPermissions();

        return response()->json([
            'b' => $permissions
        ], 200);
    }

    
}