<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please log in to access this resource.');
        }

        // Flatten roles and normalize case
        $roles = collect($roles)
            ->flatMap(fn ($role) => explode(',', $role))
            ->map(fn ($role) => strtolower(trim($role)))
            ->filter()
            ->unique()
            ->toArray();

        if (Auth::user()->hasRole($roles)) {
            return $next($request);
        }

        return redirect()->route('dashboard')
            ->with('error', 'You do not have sufficient privileges to access this resource.');
    }
}