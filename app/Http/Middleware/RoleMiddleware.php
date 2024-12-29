<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    protected $blockedUserAgents = [
        'HTTrack', 'wget', 'curl', 'bot', 'spider', 'crawler','libwww-perl',
        'python-requests',
        'python-urllib',
    ];

    public function handle($request, Closure $next, ...$roles)
    {
        // Block known scraping tools
        if ($this->isBlockedUserAgent($request->userAgent())) {
            return response('Forbidden', 403);
        }

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check user role
        $role = Auth::user()->role;
        if (!in_array($role, $roles)) {
            return abort(403);
        }

        return $next($request);
    }

    protected function isBlockedUserAgent($userAgent)
    {
        foreach ($this->blockedUserAgents as $agent) {
            if (stripos($userAgent, $agent) !== false) {
                return true;
            }
        }
        return false;
    }
}
