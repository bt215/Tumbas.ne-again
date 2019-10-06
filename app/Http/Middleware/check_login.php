<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class check_login
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
        if (Session::get("logged_in_admin") == false) {
            return redirect("login_admin");
        }
        return $next($request);
    }
}
