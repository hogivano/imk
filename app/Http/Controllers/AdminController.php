<?php
namespace App\Http\Controllers;
use Auth;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class AdminController extends Controller {
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        return view ('admin.dashboard');
    }
}
?>
