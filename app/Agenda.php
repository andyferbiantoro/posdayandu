<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
	protected $table = 'agenda';
	protected $fillable = [
        'id_ibu','id_posyandu','waktu','jenis'
    ];

     public function ibu() {
    
        return $this->belongsTo('App\Ibu','id_ibu','id');
    }
    
}
