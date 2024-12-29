<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon; // Import Carbon for date comparison

class UpdateUserBoostStatus
{
    /**
     * Handle the event.
     *
     * @param  Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $admin = $event->user; // Get the logged-in user

        if ($admin->user) {
            $user = $admin->user;

            // Retrieve the latest subscription for the user
            $latestSubscription = Subscription::where('user_id', $user->id)
            ->latest('created_at') 
            ->first(); 

            // If there is a subscription
            if ($latestSubscription) {
              
                if (Carbon::now()>$latestSubscription->end_date ) {
                    
                    $user->payment_method = null;
                    $user->save();
                }
            }

            // Check the boost end date and update if necessary
            if ($user->boost_end_at && Carbon::now()->greaterThan($user->boost_end_at)) {
                $user->boost_end_at = null;
                $user->is_boosted = 0;
                $user->save();
            }
        }
    }
}
