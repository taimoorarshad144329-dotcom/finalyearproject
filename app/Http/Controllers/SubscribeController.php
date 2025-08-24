<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    /**
     * Handle email subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.'
            ], 422);
        }

        // Here you would typically save the email to a database
        // For now, we'll just return success
        // Example: NewsletterSubscription::create(['email' => $request->email]);

        return response()->json([
            'success' => true,
            'message' => 'Thanks for Subscribing!'
        ]);
    }
}
