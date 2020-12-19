<?php

namespace App\Http\Middleware;

use Closure;

class Changelang
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
        app()->setlocale('ar');

        if(isset($request->lang) && $request->lang == 'en'){

            app()->setlocale('en');

        }
        
        return $next($request);
    }
}
