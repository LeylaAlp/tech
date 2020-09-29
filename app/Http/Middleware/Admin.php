<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::guard('yonetim')->check() && Auth::guard('yonetim')->user()->yonetici_mi)
        {
            return redirect()->route('yonetim.anasayfa');
        }else{
            return $next($request);

        }


    }
}
