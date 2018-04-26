<?php
namespace App\Http\Controllers;
use Auth;

use App\User;
use App\Soals;
use App\Warnas;
use App\Bentuks;
use App\SoalSelesais;
use App\Jawabans;
use App\PoinUsers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller {
    public function __construct(){
        // $this->middleware('auth:admin');
    }

    public function indexSoal(){
        $soals = Soals::with('Warnas', 'Bentuks')->get();
        $soalSelesai = SoalSelesais::where('id_users', Session::get('idUser'))->get();
        return view('users.soal.index', compact('soals', 'soalSelesai'));
    }

    public function detailSoal($id){
        $soals = Soals::where('id_soals', $id)->with('Jawabans', 'Warnas', 'Bentuks')->get();
        return view ('users.soal.detail_soal', compact('soals'));
    }

    public function submitSoal(Request $req){
        if ($req->jawaban != ""){
            foreach ($req->jawaban as $jawaban) {
                # code...
                $cekJawaban = Jawabans::where('id_jawabans', $jawaban)->get();
                foreach ($cekJawaban as $jwb) {
                    # code...
                    if ($jwb->benar_salah == 1){
                        $soalSelesai = new SoalSelesais();
                        $soalSelesai->id_soals = $req->id_soals;
                        $soalSelesai->id_users = $req->id_users;
                        $soalSelesai->save();

                        $poinUser = PoinUsers::where('id_users', $req->id_users)->increment('poin_users', $req->poin);
                        $p = PoinUsers::where('id_users', $req->id_users)->get();
                        foreach ($p as $px) {
                            # code...
                            Session::put('poinUser', $px->poin_users);
                        }
                        return redirect('/users/soal');
                    } else {
                        return response()->json("jawaban salah");
                    }
                }

                return response()->json($jawaban);
            }
        }
    }

    public function peringkat(){
        $idUser = Session::get('idUser');
        $namaUser = Session::get('namaUser');
        $poinUser = PoinUsers::orderBy('poin_users', 'DESC')->with('Users')->get();
        return view('users.peringkat', compact('poinUser', 'idUser', 'namaUser'));
    }

    public function keluar(){
        Session::forget('idUser');
        Session::forget('namaUser');
        Session::forget('emailUser');
        return redirect('/');
    }
}
?>
