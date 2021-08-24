<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    //
    protected $table = 'ibus';
    protected $fillable = [
        'nama','nik','status','jumlah_anak','id_user','id_posyandu'
    ];

      public function user(){

        return $this->belongsTo('App\User','id_user','id');
    }
     public function anak(){

        return $this->hasMany('App\Anak','id_ibu','id');
    }
}
