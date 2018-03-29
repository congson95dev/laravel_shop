<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use DB;

class admin_dont_have_permission
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
         $id = Session::get('admin_id');
         $arr_permission = DB::table('users')->where('pk_user_id',$id)->select('permission')->first();
         if ($arr_permission->permission=='0')
         {
          return redirect(url('admin'));
         }
        return $next($request);
     
    }
}
