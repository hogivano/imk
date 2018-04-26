<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;

class PoinUsers extends Model {

    protected $fillable = [
        'id_users', 'poin_users'
    ];
    public $timestamps = false;

    public function Users(){
        return $this->belongsTo('App\User', 'id_users', 'id_users');
    }
}

?>
