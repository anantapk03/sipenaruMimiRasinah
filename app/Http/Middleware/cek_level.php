<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cek_level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //Jika tidak Login / tidak mengisi form login 
        if (!Auth::check()){
            return redirect('login');
        }

        //Jika login 
        $user = Auth::user();
        if($user->level == $role){
            return $next($request);
        }

        //Jika tidak keduanya 
        return redirect ('login')->with('errors', 'Akses Ditolak');
        //return $next($request);
    }
}
