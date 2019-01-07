<?php

namespace App\Http\Middleware;

use App\Supports\UserPrefs;
use Closure;
use Illuminate\Http\Request;

class Auth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (UserPrefs::login()) {
            return $next($request);
        }
        $controller = $request->route()->getController();
        $action     = $request->route()->getActionMethod();
        if (isset($controller->skipActions)) {
            if (is_string($controller->skipActions)) {
                if ($controller->skipActions === 'all') {
                    return $next($request);
                }
                $controller->skipActions = explode(',', $controller->skipActions);
            }
            if (is_array($controller->skipActions) && in_array($action, $controller->skipActions)) {
                return $next($request);
            }
        }
        if ($request->ajax()) {
            return response(['error' => 'Not Allowed']);
        } else {
            return redirect('login?redirect=' . urlencode($request->getRequestUri()));
        }
    }
}
