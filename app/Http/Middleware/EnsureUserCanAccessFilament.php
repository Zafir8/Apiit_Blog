<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EnsureUserCanAccessFilament
{
    public function handle($request, Closure $next)
    {
        // Check if user is logged in and has access to Filament
        if (Auth::check() && Gate::allows('access-filament')) {
            return $next($request);
        }

        // If not, you can abort with a 403 or redirect to a different page
        abort(403, 'Unauthorized access!');
    }
}
