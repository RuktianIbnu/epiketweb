<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Model\Masterdata\Penerbangan;
use App\Model\Transaksi\Jamaah;
use App\Model\Log;
use Auth;
use DateTime;
use Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        /*$userLogin  = Auth::user()->id;
        $userKantor = Auth::user()->kode_kantor;
        $userRole   = Auth::user()->level_pengguna;
        $userNIP    = Auth::user()->nip;

        $countuser = User::where('level_pengguna','<>','1')->count();
        $countpenerbangan = Penerbangan::count();
        $countjamaah = Jamaah::count();

        $countuser2 = User::where('level_pengguna','<>','1')->where('kode_kantor','=', $userKantor)->count();
        $countpenerbangan2 = Penerbangan::where('kode_penerbangan','=','dsad')->count();
        $countjamaah2 = Jamaah::join('users', 'jamaah.nip', 'users.nip')->where('kode_kantor','=', $userKantor)->count();

        $countuser3 = User::where('level_pengguna','<>','1')->where('kode_kantor','=', $userKantor)->count();
        $countpenerbangan3 = Penerbangan::where('kode_penerbangan','=','dsad')->count();
        $countjamaah3 = Jamaah::join('users', 'jamaah.nip', 'users.nip')->where('users.nip','=', $userNIP)->count();


        return view('home', ['countuser'=> $countuser, 'countpenerbangan' => $countpenerbangan, 'countjamaah' => $countjamaah,  'countuser2'=> $countuser2, 'countpenerbangan2'=> $countpenerbangan2, 'countjamaah2' => $countjamaah2,  'countuser3'=> $countuser3,  'countpenerbangan3'=> $countpenerbangan3, 'countjamaah3' => $countjamaah3]);


    }

    public function writeLog($log) {
        
        $data = [
            'user_id' => Auth::user()->id,
            'log' => $log,
            'ip_address' => Request::ip()
        ];

        $log = new Log();
        $log->fill($data);
        $log->save();*/

    }
}
