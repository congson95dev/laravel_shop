<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'guests':
                 if (Auth::guard('guests')->check())
                     {
                      return redirect(url('/'));
                     }
             break;
              case 'web':
                 if (Auth::guard('web')->check())
                     {
                      return redirect(url('admin'));
                     }
             break;
            
            default:
                if (Auth::guard()->check())
                     {
                      return redirect(url('admin'));
                     }
            break;
            //this doesnt work @@
        }
      

        return $next($request);
    }
}
