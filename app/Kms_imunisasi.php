<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kms_imunisasi extends Model
{
	protected $table = 'kms_imunisasi';
	protected $fillable = [
         'nama_anak','id_ibu','id_posyandu','id_umur','nama_vaksin','berat_badan','tinggi_badan','suhu_badan','lingkar_kepala','tanggal','keterangan','jenis'
    ];

     public function vaksin() {
    
        return $this->belongsTo('App\Vaksin','id_vaksin','id');
    }

    public function umurs() {
    
        return $this->belongsTo('App\Umur','id_umur','id');
    }

 public function ibu() {
    
        return $this->belongsTo('App\Ibu','id_ibu','id');
    }
   
    //
}
