<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if(!request()->session()->get('uid')){
            return redirect()->to('http://www.blog.com/login');
        }
        
        return $next($request);
    }
}
