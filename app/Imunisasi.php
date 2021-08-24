<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
	protected $table = 'imunisasi';
	 protected $fillable = [
        'nama_anak','nama_vaksin','tanggal','keterangan'
    ];
    //
     public function ibu(){

        return $this->belongsTo('App\Ibu','id_ibu','id');
    }
}
