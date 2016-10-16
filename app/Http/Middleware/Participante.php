<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Participante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $personajes = Auth::whereHas('personajes', function ($query) {
            $query->where('cadaver_id', $request->id);
        })->get();

        if (!$personajes) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }

            return redirect()->guest('login');
        }

        return $next($request);
    }
}
