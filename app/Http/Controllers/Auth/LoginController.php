<?php
 
namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\User;
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
 
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
 
    use AuthenticatesUsers;
 
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
 
    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;
    protected $aktif;
 
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
 
        $this->username = $this->findUsername();
    }
 
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';

        request()->merge([$fieldType => $login]);
        
        return $fieldType;
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    public function aktif()
    {
        return $this->aktif;
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }

    public function regis() {

        $rslevel    = DB::table('roles')->select('id', 'name', DB::raw("CONCAT(name) as display"))
                            ->where('id','<>','1')
                            ->get();

        $rssubdit    = DB::table('subdit')->select('kode_subdirektorat', 'nama_subdirektorat', DB::raw("CONCAT(nama_subdirektorat) as display"))
                            ->get();

        $rsseksi    = DB::table('seksi')->select('kode_seksi', 'nama_seksi', DB::raw("CONCAT(nama_seksi) as display"))
                            ->get();
                            
        return  view('registeruser::registeruser.add', ['rslevel' => $rslevel, 'rssubdit' => $rssubdit, 'rsseksi' => $rsseksi]);
    }

}