<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogSuspiciousActivity
{
    public function handle($request, Closure $next)
    {
        // Check for known scraping tools
        $userAgent = $request->userAgent();
        $blockedUserAgents = ['HTTrack', 'wget', 'curl', 'bot', 'spider', 'crawler'];
        
        foreach ($blockedUserAgents as $agent) {
            if (stripos($userAgent, $agent) !== false) {
                Log::warning('Suspicious activity detected from IP: ' . $request->ip());
                return response('Forbidden', 403);
            }
        }

        return $next($request);
    }
}
