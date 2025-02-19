<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureCanManage
{
    public function handle(Request $request, Closure $next)
    {
        $userRole = Auth::user()->role_id ?? null;

        if (!in_array($userRole, [2, 3])) {
            abort(403, 'Acceso denegado.');
        }

        return $next($request);
    }
}
