<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/login/' . $role);
        }
        return $next($request);
    }
}