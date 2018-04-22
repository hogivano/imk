<?php
namespace App\Http\Controllers;
use Auth;

use App\User;
use App\Soals;
use App\Warnas;
use App\Bentuks;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class AdminController extends Controller {
    public function __construct(){
        // $this->middleware('auth:admin');
    }

    public function index(){
        return view ('admin.dashboard');
    }

    public function indexSoal(){
        $soals = Soals::get();
        return view('admin.soal.index', compact('soals'));
    }

    public function baruSoalShow(){
        return view('admin.soal.baru');
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
}
?>
