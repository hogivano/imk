<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Soals;

class SoalSelesais extends Model {

    protected $fillable = [
        // 'id_soals', 'id_users'
        'id_soals', 'id_poin_users'
    ];

    public $timestamps = false;

    public function Soals(){
        $this->hasMany('App\Soals', 'id_soals', 'id_soals');
    }
}

?>
