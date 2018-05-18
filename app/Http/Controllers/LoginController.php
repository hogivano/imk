<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\PoinUsers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req){
        $valid = $this->validator($req->all());
        if ($valid->fails()){
            return response()->json(array(
                'fails'     => true,
                'errors' => $valid->getMessageBag()->toArray()
            ));
        } else {
            $user = User::where('email', $req->email)->first();
            if (!empty($user)){
                if (Hash::check($req->password, $user->password)){
                    
                    if ($user->role == 0){
                        Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password], $req->has('remember'));
                        // return response()->json(array(
                        //     'fails'     => false,
                        //     'redirect'  => route('admin.dashboard')
                        // ));
                        Session::put('idAdmin',$user->id_users);
                        Session::put('namaAdmin',$user->nama_lengkap);
                        Session::put('emailAdmin',$user->email);

                        return response()->json('admin');
                        // return redirect()->route('admin.dashboard');
                    }else if ($user->role == 1){
                        $this->guard()->attempt([
                            'email'     => $req->email,
                            'password'  => $req->password
                        ], $req->has('remember'));

                        Session::put('namaUser',$user->nama_lengkap);
                        Session::put('idUser',$user->id_users);
                        Session::put('emailUser',$user->email);

                        $poinUsers = PoinUsers::where('id_users', $user->id_users)->get();

                        foreach ($poinUsers as $i) {
                            # code...
                            Session::put('poinUser', $i->poin_users);
                        }
                        return response()->json('users');
                        // return redirect()->route('users.dashboard');
                    } else {
                        return response()->json(array(
                            'fails'     => false,
                            'message'   => 'Tak tau salahnya'
                        ));
                    }
                } else {
                    return response()->json (array (
                        'fails'     => true,
                        'errors'    => 'email atau password anda salah'
                    ));
                    // $msg = "email atau password anda salah";
                    // $show = "login";
                    // return redirect()->route('index')->with('msg', 'show');
                }
            } else {
                return response()->json(array(
                    'fails'     => true,
                    'errors'    => 'email atau password anda salah'
                ));
                // $msg = "email atau password anda salah";
                // $show = "login";
                // return redirect()->route('index')->with('msg', 'show');
            }
        }
    }
    public function validator(array $data){
      $rules = [
        'email'     => 'required|string|email',
        'password'  => 'required|string',
      ];
      return Validator::make($data,$rules);
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
?>
