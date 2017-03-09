<?php

namespace App\Http\Middleware;

use Closure;

class TenMiddleware
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
      if($request->tuoi<20){
        return redirect()->back()->with('thong_bao','Bạn ko được phép truy cập');
      }
      else
        return $next($request);
    }
}
