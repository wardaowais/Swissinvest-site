<?php

namespace App\Http\Middleware;

use App\Models\Subscription;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SMS
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
        $user = $admin->user;

        // Define the feature parameter
        $feature = 'send_sms';

        // Logic to check if user has the SMS feature in their subscription
        $subscription = Subscription::where('user_id', $user->id)
            ->whereHas('plan', function ($query) use ($feature) {
                $query->where('feature', $feature);
            })
            ->where('end_date', '>', Carbon::now()) // Ensure the subscription is valid
            ->first();

        // Redirect if no subscription matches the feature
        if (!$subscription) {
            return redirect()->route('sms.byFeature', ['feature' => $feature]);
        }

        return $next($request);
    }
}
