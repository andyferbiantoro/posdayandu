<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
	protected $table = 'vaksin';
    //
     public function umur(){

        return $this->belongsTo('App\Umur','id','id_umur');
    }
}
