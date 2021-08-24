<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password','role','id_posyandu','otp','nohp','fcm_token','order_id','saldo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //fungsi cek role untuk miidle ware

     //membuat fungsi isAdmin untuk admin
    public function isAdmin(){

        //jika role=admin maka benar
        if($this->role == 'admin'){

            return true;
        }
            return false;
    }

     public function isKader(){

        //jika role=kader maka benar
        if($this->role == 'kader'){

            return true;
        }
            return false;
    }
    public function posyandu() {
    
        return $this->belongsTo('App\Posyandu','id_posyandu','id');
    }
}
