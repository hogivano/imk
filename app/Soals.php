<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Soals extends Model {

    protected $fillable = [
        'id_warnas', 'id_bentuks', 'judul', 'pertanyaan', 'poin'
    ];
    public $timestamps = false;
}

?>
