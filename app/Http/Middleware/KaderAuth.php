<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class KaderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

        //pendaftaran miidleware baru di Kernel.php buat nya pake php artisan make:middleware namanya

    public function handle($request, Closure $next)
    {


        $user = \Auth::user();

       //jika bukan kader, maka tetap dihalaman yang terakhir kali diakses.
        if($user->isKader()){
            return $next($request);
        }else{
            return redirect()->back(); //kembali ke halaan sebelumnya
        }
        
    }
}
