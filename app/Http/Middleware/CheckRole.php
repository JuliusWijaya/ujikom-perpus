<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles = [
            'admin'   => ['admin'],
            'anggota' => ['anggota'],
        ];

        // Cek apakah user yang terauntentikasi tidak sama dengan roles
        if (!in_array(Auth::user()->hak_akses, $roles[$role])) {
            // Jika tidak sama maka return 403
            return abort(403);
        }

        return $next($request);
    }
}
