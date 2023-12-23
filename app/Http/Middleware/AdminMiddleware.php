<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->rol !== 'admin') {
            return redirect()->back();
        }
        return $next($request);
    }
}
