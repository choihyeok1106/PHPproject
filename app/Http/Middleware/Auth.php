<?php

namespace App\Http\Middleware;

use App\Supports\UserAccess;
use Closure;

class Auth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!UserAccess::isLogin())
            return redirect('login?redirect=' . urlencode($request->getRequestUri()));
        return $next($request);
    }
}
