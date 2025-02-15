<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Registration;
use Illuminate\Http\Request;
use Validator;

class RegistrationController extends Controller
{
    public function index()
    {

        return view('registration.index');  // Passing data to the view
    }


    // public function store()
    // {
    //     flash()
    //     ->options([
    //         'timeout' => 3000, // 3 seconds
    //         'position' => 'bottom-center',
    //     ])
    //     ->info('This may take some time. Do not refresh the page.');


    //     return redirect()->back();
    // }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'organization' => 'required|string',
            'category' => 'required|in:tanzania,international'
        ]);


        if ($validator->fails()) {
            // return response()->json($validator->errors());
            foreach ($validator->errors() as $error) {
                flash()
                    ->options([
                        'timeout' => 3000, // 3 seconds
                        'position' => 'bottom-center',
                    ])
                    ->error($error);
            }
        }



        $email = $request->email;

        $registeredUser = Registration::where('email', $email)->first();

        if ($registeredUser) {


            if ($registeredUser->status === 'paid') {
                return redirect()->route('registration.paid');
            } else {

                if ($registeredUser->registered_as === 'tanzania') {



                    // return $registeredUser->id;
                    return redirect()->route('registration.payment', ['user_id' => $registeredUser->id]);
                } else {

                    return redirect()->route('registration.non.payment', ['user_id' => $registeredUser->id]);
                }

            }
        }

        $category = $request->category;

        $newRegistered = Registration::create([
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'organization' => $request->organization,
            'registered_as' => $category
        ]);
        if ($newRegistered) {
            if ($category == 'tanzania') {
                return redirect()->route('registration.payment', ['user_id' => $newRegistered->id]);

            } else {
                return redirect()->route('registration.non.payment', ['user_id' => $newRegistered->id]);
            }

        } else {
            //put toastr
            return redirect()->back();
        }
    }




    public function tanzaniaPayment($user_id)
    {

        $methods = PaymentMethod::where('type', 'mobile_money')->get();

        return view('registration.payment', compact('methods', 'user_id'));
    }



    public function waiting($user_id)
    {

        return view('registration.waiting',compact('user_id'));
    }

    public function nonTanzaniaPayment($user_id)
    {

        $methods = PaymentMethod::where('type', 'card')->get();

        return view('registration.non_payment', compact('methods', 'user_id'));
    }



    public function checkPaymentStatus($user_id)
{
    $registeredUser = Registration::find($user_id);

    return response()->json([
        'status' => $registeredUser->status
    ]);
}


    public function paid()
    {


        return view('registration.paid');
    }
}