<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ibu_hamil extends Model
{
    //
    protected $table = 'ibu_hamil';
     protected $fillable = [
     	'id_ibu',
        'hpht',
        'htp',
        'lingkar_lengan',
        'kek','tinggi_badan',
        'gol_darah',
        'kontrasepsi',
        'riwayat_penyakit',
        'riwayat_alergi',
        'hamil_ke',
        'jumlah_persalinan',
        'jumlah_keguguran',
        'jumlah_anak_hidup',
        'jumlah_lahir_mati',
        'jarak_kehamilan',
        'status_imunisasi_terakhir',
        'penolong_persalinan',
        'id_posyandu'
    ];
 public function ibus() {
    
        return $this->belongsTo('App\Ibu','id_ibu','id');
    }
}
