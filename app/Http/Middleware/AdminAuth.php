<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;

class AdminAuth
{

    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
