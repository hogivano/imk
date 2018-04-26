<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Bentuks;
use App\Warnas;

class Soals extends Model {

    protected $fillable = [
        'id_warnas', 'id_bentuks', 'judul', 'pertanyaan', 'poin'
    ];
    public $timestamps = false;

    public function Bentuks(){
        return $this->belongsTo('App\Bentuks', 'id_bentuks', 'id_bentuks');
    }

    public function Warnas(){
        return $this->belongsTo('App\Warnas', 'id_warnas' , 'id_warnas');
    }

    public function Jawabans(){
        return $this->hasMany('App\Jawabans', 'id_soals', 'id_soals');
    }
}

?>
