<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('CheckRole middleware triggered', ['user' => $request->user(), 'path' => $request->path()]);

        // Check if the user is authenticated
        if ($request->user() && !$request->user()->isAdmin() && ($request->is('selling') || $request->is('selling/*'))) {
            Log::info('User not authenticated, redirecting to login');
            return redirect()->route('home');
        }

//        Log::info('User role', ['role' => $request->user()->role]);

        // Check if the user is an admin for specific routes
       /* if ($request->is('selling') || $request->is('selling/*')) {
            if ($request->user()->role !== 'admin') {
                Log::info('Non-admin user trying to access selling, redirecting to home');
                return redirect()->route('home');
            }
        }

        Log::info('Allowing access');*/
        return $next($request);
    }

}
