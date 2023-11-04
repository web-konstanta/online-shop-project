<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $basketProducts = session()->get('basketProducts');
        if (!$basketProducts) {
            return redirect()->route('product.index');
        }
        return $next($request);
    }
}
