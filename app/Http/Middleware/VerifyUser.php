<?php

namespace App\Http\Middleware;

use App\Models\Subscription;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Verification;
use App\Models\User;
use Carbon\Carbon;
class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = auth()->user();
        $user = $admin->user; // Use the correct user

        $feature = $request->route()->parameter('feature');

        $subscription = Subscription::where('user_id', $user->id)
            ->whereHas('plan', function ($query) use ($feature) {
                $query->where('feature', $feature);
            })
            ->where('end_date', '>', Carbon::now()) // Check if the subscription is still valid
            ->first();

        // If no valid subscription exists, redirect to the plans page for 'chat'
        if (!$subscription) {
            return redirect()->route('plans.byFeature', ['feature' => $feature]);
        }

        // If valid, proceed to the chat page
        return $next($request);
    }
}
