<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Warnas extends Model {

    protected $fillable = [
        'warna', 'hex'
    ];
    public $timestamps = false;
}

?>
