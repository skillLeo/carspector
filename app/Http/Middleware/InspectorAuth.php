<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InspectorAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('inspector')->check()) {
            return redirect()->route('inspector.login')
                ->with('error', 'Please log in to access the inspector portal.');
        }

        $inspector = auth()->guard('inspector')->user();

        if ($inspector->status !== 'active') {
            auth()->guard('inspector')->logout();
            return redirect()->route('inspector.login')
                ->with('error', 'Your account is not yet active. Please complete registration via the invitation email.');
        }

        return $next($request);
    }
}
