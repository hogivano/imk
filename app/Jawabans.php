<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Soals;

class Jawabans extends Model {

    protected $fillable = [
        'id_soals', 'jawaban', 'benar_salah'
    ];
    public $timestamps = false;

    public function Soals(){
        return $this->belongsTo('App\Soals', 'id_soals', 'id_soals');
    }
}

?>
