<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Redirect if user is under 18 when accessing the dashboard
            if ($user->age < 18 && $request->is('dashboard')) {
                return redirect()->route('welcome')->withErrors(['age' => 'You must be at least 18 years old to access the dashboard.']);
            }
        }
        return $next($request);
    }
}