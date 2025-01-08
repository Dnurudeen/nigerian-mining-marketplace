<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function showSubscriptionPage()
    {
        $subscriptions = Subscription::where('seller_id', auth()->id())->get();

        return view('subscriptions.index', compact('subscriptions')); // Display subscription page
    }


    public function subscribe(Request $request)
    {
        // $user = User::findOrFail($request->user_id);

        $request->validate([
            'plan_type' => 'required|in:weekly,monthly,three_days',
        ]);


        // Define the plan amounts
        $plans = [
            'weekly' => 15000,   // $10 for weekly plan
            'monthly' => 50000,  // $30 for monthly plan
            'three_days' => 7500,  // $300 for yearly plan
        ];

        // Get the selected plan type and corresponding amount
        $planType = $request->plan_type;
        $amount = $plans[$planType];

        // Set expiration date based on plan type
        if ($planType == 'weekly') {
            $expiresAt = Carbon::now()->addWeek();
        } elseif ($planType == 'monthly') {
            $expiresAt = Carbon::now()->addMonth();
        } else {
            $expiresAt = Carbon::now()->addDays(3);
        }

        // Create or update the subscription record for the seller
        $subscription = Subscription::updateOrCreate(
            // ['user_id' => $user->id],
            // ['user_id' => auth()->id()],
            [
                'seller_id' => auth()->id(),
                'user_id' => auth()->id(),
                'plan_type' => $planType,
                'status' => 'active',
                'expires_at' => $expiresAt,
            ]
        );


        // Assume payment is successful and generate a transaction ID
        $transactionId = uniqid('txn_'); // You can replace this with actual payment processing logic

        // Save payment details to the payments table
        Payment::create([
            'seller_id' => auth()->id(),
            'amount' => $amount,
            'payment_status' => 'completed',
            'transaction_id' => $transactionId,
        ]);

        return redirect()->route('subscribe')->with('success', 'Subscription created successfully!');
        // return response()->json(['message' => 'Subscription created successfully', 'subscription' => $subscription]);
    }

    // public function checkStatus(User $user)
    // {
    //     $subscription = $user->subscription;

    //     if ($subscription && $subscription->expires_at->isFuture()) {
    //         return response()->json(['status' => 'active', 'expires_at' => $subscription->expires_at]);
    //     }

    //     // return response()->json(['status' => 'inactive']);
    // }
}
