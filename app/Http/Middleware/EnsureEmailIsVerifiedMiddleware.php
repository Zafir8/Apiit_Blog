<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerifiedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            // If the email is not verified, redirect to the email verification notice
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}

