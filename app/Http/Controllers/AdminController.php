<?php
namespace App\Http\Controllers;
use Auth;

use App\User;
use App\Soals;
use App\Warnas;
use App\Bentuks;
use App\Jawabans;
use App\SoalSelesais;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller {
    public function __construct(){
        // $this->middleware('auth:admin');
    }

    public function index(){
        return view ('admin.dashboard');
    }


    // Soal
    public function indexSoal(){
        $soals = Soals::with('Warnas', 'Bentuks')->get();
        return view('admin.soal.index', compact('soals'));
    }

    public function baruSoalShow(){
        $warna = Warnas::all();
        $bentuk = Bentuks::all();
        return view('admin.soal.baru', compact('warna', 'bentuk'));
    }

    public function soalCreate(Request $req){
        $soals = new Soals();
        $soals->id_warnas = $req->selectWarna;
        $soals->id_bentuks = $req->selectBentuk;
        $soals->pertanyaan = $req->pertanyaan;
        $soals->judul = $req->judul;
        $soals->poin = $req->poin;
        $soals->save();

        if ($req->check != ""){
            foreach ($req->check as $i) {
                # code...
                $checked = $i;
            }
        }

        $jawaban1 = new Jawabans();
        $jawaban1->id_soals = $soals->id;
        $jawaban1->jawaban = $req->jawaban1;
        if ($checked == "1"){
            $jawaban1->benar_salah = 1;
        } else {
            $jawaban1->benar_salah = 0;
        }
        $jawaban1->save();

        $jawaban2 = new Jawabans();
        $jawaban2->id_soals = $soals->id;
        $jawaban2->jawaban = $req->jawaban2;
        if ($checked == "2"){
            $jawaban2->benar_salah = 1;
        } else {
            $jawaban2->benar_salah = 0;
        }
        $jawaban2->save();

        $jawaban3 = new Jawabans();
        $jawaban3->id_soals = $soals->id;
        $jawaban3->jawaban = $req->jawaban3;
        if ($checked == "3"){
            $jawaban3->benar_salah = 1;
        } else {
            $jawaban3->benar_salah = 0;
        }
        $jawaban3->save();

        $jawaban4 = new Jawabans();
        $jawaban4->id_soals = $soals->id;
        $jawaban4->jawaban = $req->jawaban4;
        if ($checked == "4"){
            $jawaban4->benar_salah = 1;
        } else {
            $jawaban4->benar_salah = 0;
        }
        $jawaban4->save();

        return redirect('/admin/soal');
    }

    public function soalEditShow($id){
        $warna = Warnas::all();
        $bentuk = Bentuks::all();
        $soal = Soals::where('id_soals', $id)->get();
        $jawaban = Jawabans::where('id_soals', $id)->get();
        return view('admin.soal.edit', compact('warna', 'bentuk', 'soal', 'jawaban'));
    }

    public function soalEditUpdate(Request $req){
        $soals = Soals::where('id_soals', $req->id_soals)->update([ 'judul' => $req->judul, 'poin' => $req->poin, 'pertanyaan' => $req->pertanyaan,
                                                                    'id_bentuks' => $req->selectBentuk, 'id_warnas' => $req->selectWarna]);

        if ($req->check != ""){
            foreach ($req->check as $i) {
                # code...
                $checked = $i;
            }
        }

        if ($checked == 1){
            $jawaban1 = Jawabans::where('id_jawabans', $req->idJawaban1)->update(['jawaban' => $req->jawaban1, 'benar_salah' => 1]);
        } else {
            $jawaban1 = Jawabans::where('id_jawabans', $req->idJawaban1)->update(['jawaban' => $req->jawaban1, 'benar_salah' => 0]);
        }

        if ($checked == 2){
            $jawaban2 = Jawabans::where('id_jawabans', $req->idJawaban2)->update(['jawaban' => $req->jawaban2, 'benar_salah' => 1]);
        } else {
            $jawaban2 = Jawabans::where('id_jawabans', $req->idJawaban2)->update(['jawaban' => $req->jawaban2, 'benar_salah' => 0]);
        }

        if ($checked == 3){
            $jawaban3 = Jawabans::where('id_jawabans', $req->idJawaban3)->update(['jawaban' => $req->jawaban3, 'benar_salah' => 1]);
        } else {
            $jawaban3 = Jawabans::where('id_jawabans', $req->idJawaban3)->update(['jawaban' => $req->jawaban3, 'benar_salah' => 0]);
        }

        if ($checked == 4){
            $jawaban4 = Jawabans::where('id_jawabans', $req->idJawaban4)->update(['jawaban' => $req->jawaban4, 'benar_salah' => 1]);
        } else {
            $jawaban4 = Jawabans::where('id_jawabans', $req->idJawaban4)->update(['jawaban' => $req->jawaban4, 'benar_salah' => 0]);
        }

        return redirect('/admin/soal');
    }

    public function soalDelete($id){
        $jawabans = Jawabans::where('id_soals', $id)->delete();
        $soalSelesais = SoalSelesais::where('id_soals', $id)->delete();
        $soals = Soals::where('id_soals', $id)->delete();

        return redirect('/admin/soal');
    }


    public function indexWarna(){
        $warna = Warnas::get();
        return view ('admin.warna.index', compact('warna'));
    }

    public function baruWarnaShow(){
        return view ('admin.warna.baru');
    }

    public function warnaCreate(Request $req){
        $warna = $req->warna;
        $hex = $req->hex;

        $warnas = new Warnas();
        $warnas->warna = $warna;
        $warnas->hex = $hex;
        $warnas->save();

        return redirect('/admin/warna');
    }

    public function warnaEditShow($id){
        $warna = Warnas::where('id_warnas', $id)->get();
        return view ('admin.warna.edit', compact('warna'));
    }

    public function warnaEditUpdate(Request $req){
        $warna = Warnas::where('id_warnas', $req->id_warnas)->update(['warna' => $req->warna, 'hex' => $req->hex]);
        return redirect('/admin/warna');
    }

    public function warnaDelete($id){
        $delWarna = Soals::where('id_warnas', $id)->update(['id_warnas' => 0]);
        $warnas = Warnas::where('id_warnas', $id)->delete();

        return redirect('admin/warna');
    }


    ///Bentuk
    public function indexBentuk(){
        $bentuk = Bentuks::get();
        return view ('admin.bentuk.index', compact('bentuk'));
    }

    public function baruBentukShow(){
        return view ('admin.bentuk.baru');
    }

    public function bentukCreate(Request $req){
        $bentuks = new Bentuks();
        $bentuks->bentuk = $req->bentuk;
        $bentuks->save();

        return redirect('/admin/bentuk');
    }

    public function bentukEditShow($id){
        $bentuk = Bentuks::where('id_bentuks', $id)->get();
        return view ('admin.bentuk.edit', compact('bentuk'));
    }

    public function bentukEditUpdate(Request $req){
        $bentuk = Bentuks::where('id_bentuks', $req->id_bentuks)->update(['bentuk' => $req->bentuk]);
        return redirect('/admin/bentuk');
    }

    public function bentukDelete($id){
        $soals = Soals::where('id_bentuks', $id)->update(['id_bentuks' => 0]);
        $bentuks = Bentuks::where('id_bentuks', $id)->delete();

        return redirect('/admin/bentuk');
    }

    public function keluar(){
        Session::forget('idAdmin');
        Session::forget('namaAdmin');
        Session::forget('emailAdmin');
        return redirect('/');
    }
}
?>
