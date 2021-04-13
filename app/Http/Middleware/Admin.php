<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
        return $next($request);
        }
        return redirect('home');
    }
}
