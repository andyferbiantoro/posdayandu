<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    //
    protected $table = 'kaders';
     protected $fillable = [
        'id_user','id_posyandu','nik','nama','image','tanggal_aktif'
    ];

}
