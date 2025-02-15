<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Log;

class CallbackController extends Controller
{
    public function index(Request $request)
    {

        try {
            // Log the callback data for debugging
            Log::info('Payment Callback Received:', $request->all());

            // Validate incoming request
            $request->validate([
                'controlNumber' => 'required|string', // Control number
                'status' => 'required' // Expected values: success, failed, pending
            ]);

            // Retrieve ref_id from request
            $ref_id = $request->controlNumber;
            $status = strtolower($request->status);

            // Find the payment by ref_id (control number)
            $payment = Payment::where('ref_id', $ref_id)->first();

            if (!$payment) {
                Log::warning("Payment with ref_id: $ref_id not found.");
                return response()->json([
                    'status' => false,
                    'message' => "Payment not found."
                ], 404);
            }

            // Get the associated registration ID
            $registration = Registration::find($payment->registration_id);

            if (!$registration) {
                Log::warning("Registration record for user_id: {$payment->registration_id} not found.");
                return response()->json([
                    'status' => false,
                    'message' => "User registration not found."
                ], 404);
            }

            // Check payment status and update accordingly
            // if ($status === 'success') {
                $payment->update(['status' => 'success']);
                $registration->update(['status' => 'paid']);

                Log::info("Payment $ref_id marked as success, Registration status updated.");

                return response()->json([
                    'status' => true,
                    'message' => "Payment successful. Registration updated."
                ]);
            // } elseif ($status === 'failed') {
            //     $payment->update(['status' => 'failed']);

            //     Log::warning("Payment $ref_id marked as failed.");

            //     return response()->json([
            //         'status' => false,
            //         'message' => "Payment failed."
            //     ], 400);
            // } else {
            //     Log::info("Payment $ref_id has an unrecognized status: $status.");

            //     return response()->json([
            //         'status' => false,
            //         'message' => "Invalid payment status."
            //     ], 400);
            // }

        } catch (\Exception $e) {
            Log::error('Payment Callback Error:', ['error' => $e->getMessage()]);

            return response()->json([
                'status' => false,
                'message' => "Internal server error."
            ], 500);
        }

    }
}
