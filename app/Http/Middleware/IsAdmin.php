<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        if (auth()->guest()) {
            abort(403); // Tampilkan error 403 jika pengguna belum login.
        }

        if (!auth()->user()->is_admin) {
            abort(403); // Tampilkan error 403 jika pengguna bukan memiliki ID 1.
        }
        return $next($request);
    }
}
