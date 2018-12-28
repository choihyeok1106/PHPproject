<?php

namespace App\Http\Middleware;

use App\Supports\UserPrefs;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Auth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (!UserPrefs::isLogin()) {
            if ($request->ajax()) {
                return response(['error' => 'Not Allowed']);
            } else {
                return redirect('login?redirect=' . urlencode($request->getRequestUri()));
            }

        }
        return $next($request);
    }
}
