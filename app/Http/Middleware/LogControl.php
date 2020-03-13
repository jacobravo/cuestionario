<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LogControl
{
    public function handle($request, Closure $next)
    {
        if(Session::get('usuario') == null){ 

            return redirect(Route('/'));
        }
        else{
            return $next($request);
        }
    }
}
