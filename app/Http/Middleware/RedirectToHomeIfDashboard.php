<?php
//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Http\Request;
//
//class RedirectToHomeIfDashboard
//{
//    public function handle(Request $request, Closure $next)
//    {
//        $route = $request->route();
//
//        if ($route && str_starts_with($route->getName(), 'dashboard')) {
//            return redirect()->route('home');
//        }
//
//        return $next($request);
//    }
//}
