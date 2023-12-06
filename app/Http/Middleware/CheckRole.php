<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  $role  ): Response
    {
        $user = Auth::user();

        // Verificar si el usuario tiene el rol adecuado
        if ($user && $user->role === $role) {
            return $next($request);
        }

        return response()->json(['message' => 'Acceso no autorizado'], 403);
    }
}
