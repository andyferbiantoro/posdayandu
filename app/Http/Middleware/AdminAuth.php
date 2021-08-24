<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //pendaftaran miidleware baru di Kernel.php php artisan make:middleware namanya
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();

       //jika bukan admin, maka tetap dihalaman yang terakhir kali diakses.
        if($user->isAdmin()){
            return $next($request);
        }else{
            return redirect()->back();//kembali ke halaan sebelumnya
        }
        
    }
}
