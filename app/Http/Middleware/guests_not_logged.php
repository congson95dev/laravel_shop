<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class guests_not_logged
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
        if (!Session::has('email'))
         {
          return redirect(url('guest_login'));
         }
        return $next($request);
    
    }
}
