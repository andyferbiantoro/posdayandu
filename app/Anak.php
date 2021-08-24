<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
	protected $table = 'anaks';
	 protected $fillable = [
        'nama','id_ibu','ttl'
    ];
    //
     public function ibu(){

        return $this->belongsTo('App\Ibu','id','id_ibu');
    }
}
