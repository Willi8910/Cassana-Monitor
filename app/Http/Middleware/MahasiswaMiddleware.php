<?php

namespace App\Http\Middleware;

use Closure;
use App\user;
use Auth;

class MahasiswaMiddleware
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
        if(Auth::user()->Mahasiswa){
            return $next($request);
        }
        return redirect('/mainmahasiswa');
    }
}
