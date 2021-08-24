<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'video';
    protected $fillable = [
        'nama_video','judul','deskripsi','kategori','pemeran'
    ];
}
