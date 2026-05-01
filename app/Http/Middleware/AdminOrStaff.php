<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOrStaff
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $type = auth()->user()->type ?? null;
        if (!in_array($type, ['admin', 'staff'])) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}

