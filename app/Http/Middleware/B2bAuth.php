<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class B2bAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guard('b2b')->check()) {
            return redirect()->route('b2b.login')->with('error', 'Please log in to access the partner portal.');
        }

        $partner = auth()->guard('b2b')->user();

        if ($partner->status !== 'active') {
            auth()->guard('b2b')->logout();
            return redirect()->route('b2b.login')
                ->with('error', 'Your account has been deactivated. Please contact Carspector.');
        }

        return $next($request);
    }
}
