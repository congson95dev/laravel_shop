<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Cart;

class cart_not_found
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
        // if (Session::has('email'))
        //  {
        //   return redirect(url('admin'));
        //  }  

         if (Cart::count() == 0)
         {
          return redirect(url('cart'));
         }
        return $next($request);
     
    }
}
