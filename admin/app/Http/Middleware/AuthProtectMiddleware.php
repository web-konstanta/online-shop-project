<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthProtectMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->check()) {
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
