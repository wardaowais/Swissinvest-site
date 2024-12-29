<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookShare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = auth()->user();
        $user = $admin->user;

        // Get the dynamic feature parameter for book_share
        $feature = 'book_share';

        // Logic to handle the subscription check for book_share
        $subscription = Subscription::where('user_id', $user->id)
            ->whereHas('plan', function ($query) use ($feature) {
                $query->where('feature', $feature);
            })
            ->where('end_date', '>', Carbon::now()) // Check if the subscription is still valid
            ->first();

        // Redirect if no subscription matches the feature
        if (!$subscription) {
            return redirect()->route('plans.byFeature', ['feature' => $feature]);
        }

        return $next($request);
    }
}
