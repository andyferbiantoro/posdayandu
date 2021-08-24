<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrol_kehamilan extends Model
{
    //
    protected $table = 'kontrol_kehamilan';
     protected $fillable = [
        'id_ibuhamil',
        'tanggal',
        'keluhan',
        'tekanan_darah',
        'berat_badan',
        'umur_kehamilan',
        'tinggi_fundus',
        'letak_janin',
        'denyut_jantung_janin',
        'kaki_bengkak',
        'hasil_lab',
        'tindakan',
        'nasihat',
        'keterangan',
        'waktu_kembali',
        'id_posyandu'
        
    ];
    
    // public function ibu() {
    
    //     return $this->belongsTo('App\Ibu','id_ibuhamil','id');
    // }


    public function ibu_hamil(){

        return $this->belongsTo('App\ibu_hamil','id_ibuhamil','id');
    }

}
