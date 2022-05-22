<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::user()->is_admin) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated. You are not an admin.'], 401);
            }

            abort(403, "You're not admin, you don't have the permission.");
        }

        return $next($request);
    }
}
