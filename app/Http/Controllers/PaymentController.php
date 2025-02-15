<?php

namespace App\Http\Controllers;

use App\Helpers\NetworkHelper;
use App\Helpers\PaymentHelper;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Registration;
use Illuminate\Http\Request;
use Log;
use Validator;

class PaymentController extends Controller
{
    public function mobile(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'user_id' => 'required|numeric'
        ]);


        // $phone = $request->phone;
        // $paymentHelper = new PaymentHelper();
        // $networkHelper = new NetworkHelper();

        // // Get network provider
        // $network = $networkHelper->getNetworkByPrefix($phone);
        // $network_id = PaymentMethod::where('key', $network)->first();


        // return response()->json([
        //     'net' => $network,
        //     'net_id' => $network_id->id
        // ]);

        if ($validator->fails()) {
            flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-center',
                ])
                ->error($validator->errors()->first());
            return redirect()->back();
        }

        try {
            // Retrieve request data
            $user_id = $request->user_id;
            $phone = $request->phone;
            $amount = 120000; // Fixed payment amount

            // Initialize helpers
            $paymentHelper = new PaymentHelper();
            $networkHelper = new NetworkHelper();

            // Get network provider
            $network = $networkHelper->getNetworkByPrefix($phone);
            $network_id = PaymentMethod::where('key', $network)->first();

            // Check if the user exists
            $user = Registration::find($user_id);
            if (!$user) {
                // return response()->json([
                //     'status' => false,
                //     'message' => 'User not found'
                // ], 404);

                flash()
                    ->options([
                        'timeout' => 3000, // 3 seconds
                        'position' => 'bottom-center',
                    ])
                    ->error("User not found");
                return redirect()->back();
            }

            // Prepare payment data
            $dataArray = [
                "customerName" => $user->first_name . " " . $user->last_name,
                "customerMsisdn" => $phone,
                "amount" => $amount,
                "network" => $network,
                "billertype" => "USSD"
            ];

            // Initiate payment
            $controlNumber = $paymentHelper->initiatePayment($dataArray);



            if ($controlNumber) {
                // Payment successful, save transaction
                $payment = Payment::create([
                    'ref_id' => $controlNumber,
                    'registration_id' => $user_id,
                    'phone' => $phone,
                    'amount' => $amount,
                    'payment_method_id' => $network_id->id,
                    'status' => 'pending' // Mark as pending until confirmed
                ]);

                // return response()->json([
                //     'status' => true,
                //     'message' => 'Payment initiated successfully',
                //     'controlNumber' => $controlNumber
                // ]);

                flash()
                    ->options([
                        'timeout' => 3000, // 3 seconds
                        'position' => 'bottom-center',
                    ])
                    ->success("Payment initiated successfully");
                return redirect()->route('registration.waiting', ['user_id' => $user_id]);
            } else {
                // Payment failed
                // return response()->json([
                //     'status' => false,
                //     'message' => 'Payment initiation failed'
                // ], 400);

                flash()
                    ->options([
                        'timeout' => 3000, // 3 seconds
                        'position' => 'bottom-center',
                    ])
                    ->error("Payment initiation failed");
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error('Payment Error:', ['error' => $e->getMessage()]);
            // return response()->json([
            //     'status' => false,
            //     'message' => 'An error occurred while processing payment'
            // ], 500);

            flash()
                ->options([
                    'timeout' => 3000, // 3 seconds
                    'position' => 'bottom-center',
                ])
                ->error("An error occured while processing payment");
            return redirect()->back();
        }
    }




    public function card()
    {




    }

}
