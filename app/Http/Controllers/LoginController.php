<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
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
                    if ($req->role == 0){
                        Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password], $req->has('remember'));
                        // return response()->json(array(
                        //     'fails'     => false,
                        //     'redirect'  => route('admin.dashboard')
                        // ));
                        return redirect()->route('admin.dashboard');
                    }else if ($req->role == 1){
                        $this->guard()->attempt([
                            'email'     => $req->email,
                            'password'  => $req->password
                        ], $req->has('remember'));
                        return response()->json(array(
                            'fails'     => false,
                            'message'   => 'anda masuk halaman user biasa'
                        ));
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
                }
            } else {
                return response()->json(array(
                    'fails'     => true,
                    'errors'    => 'email atau password anda salah'
                ));
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
