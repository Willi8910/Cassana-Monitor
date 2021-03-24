<?php

namespace App\Http\Middleware;

use Closure;
use App\user;
use Auth;

class DosenMiddleware
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
        if(Auth::user()->Dosen){
            return $next($request);
        }
        return redirect('/mainmahasiswa');
    }
}
