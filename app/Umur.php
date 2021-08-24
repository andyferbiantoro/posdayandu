<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umur extends Model
{
    //
      protected $table = 'umur';
       public function vaksin(){

        return $this->hasMany('App\Vaksin','id_umur','id');
    }
}
