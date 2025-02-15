@extends('layouts.app')
@section('main')
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Event Registration</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <section class="contact-section">
        <div class="container">

            <div class="container py-8">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center mb-4">
                        <div class="event-container">
                            <div class="event-header">
                                <img src="assets/img/logo/loder.png" alt="Event Logo"
                                    style="width: 180px; height: auto; object-fit: contain;">

                                <h2 class="contact-title fw-bold">International Event Registration</h2>
                            </div>
                            <p class="event-description">Join professionals from around the globe at this exclusive event.
                                Complete the form to secure your participation.</p>
                        </div>
                    </div>


                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <form class=" p-5 shadow rounded" action="{{ route('registration.store') }}"
                            method="POST"
                            style="background: #ffffff; border: 2px solid #F05A25; border-radius: 15px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);">
                            @csrf
                            <!-- Personal Information -->
                            <h4 class="mb-4 text-primary"
                                style="color: #F05A25 !important; font-weight: bold; text-transform: uppercase; text-align: center; border-bottom: 3px solid #F05A25; display: inline-block; padding-bottom: 5px;">
                                Personal Information</h4>

                            <div class="row g-3">
                                <!-- Title Field -->
                                <div class="col-md-3">
                                    <select class="form-select shadow-sm" id="title" name="title" required>
                                        {{-- <option value="" disabled selected>Title</option> --}}
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Eng.">Eng.</option>
                                        <option value="Hon.">Hon.</option>
                                        <option value="Sir">Sir</option>
                                    </select>
                                    <label for="title">Select Title</label>
                                </div>

                                <!-- Name Fields -->
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control shadow-sm" id="first_name"
                                            name="first_name" placeholder="First Name" required>
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-floating">
                                        <input type="text" class="form-control shadow-sm" id="last_name" name="last_name"
                                            placeholder="Last Name" required>
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email and Phone -->
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control shadow-sm" id="email" name="email"
                                            placeholder="Email Address" required>
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control shadow-sm" id="phone" name="phone"
                                            placeholder="Phone Number" required>
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Event Details -->
                            <h4 class="mt-4 mb-4 text-primary"
                                style="color: #F05A25 !important; font-weight: bold; text-transform: uppercase; text-align: center; border-bottom: 3px solid #F05A25; display: inline-block; padding-bottom: 5px;">
                                Event Details</h4>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <select class="form-select shadow-sm" id="country" name="country" required>
                                        {{-- <option value="" >Country</option> --}}
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Kenya">Kenya</option>

                                        <!-- Add more options as needed -->
                                    </select>
                                    <label for="country">Select Country</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control shadow-sm" id="organization"
                                        name="organization" placeholder="Organization" required>
                                    <label for="organization">Organization</label>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control shadow-sm" id="additional_info" name="additional_info"
                                    placeholder="Additional Information" style="height: 100px;"></textarea>
                                <label for="additional_info">Additional Information</label>
                            </div>

                            <!-- Payment Information -->
                            <h4 class="mt-4 mb-4 text-primary section-title">Payment Information</h4>
                            <p class="text-muted">Choose your preferred payment method. Tanzanian attendees can pay via
                                local phone payment, while international attendees can use PayPal.</p>

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <select class="form-select shadow-sm" id="payment_category" name="category" required>
                                        {{-- <option value="">Select Payment Category</option> --}}
                                        <option value="tanzania">Tanzania (Non-TAWEN Member) - TZS 120,000</option>
                                        <option value="international">Non-Tanzanian - USD 150</option>
                                    </select>
                                    <label for="payment_category">Payment Category</label>
                                </div>



                            </div>


                            <style>
                                .payment-method:hover {
                                    transform: scale(1.05);
                                    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
                                }
                            </style>


                            <!-- PayPal Payment Section -->


                            <!-- <div class="text-center mt-4">
                                    <button type="button" id="registerBtn" class="btn btn-lg"
                                        style="background: linear-gradient(135deg, #F05A25, #FF4500); color: white; padding: 12px 36px; border-radius: 30px; font-size: 18px; font-weight: 600; font-family: 'Arial', sans-serif; letter-spacing: 1px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.4s ease-in-out; text-transform: uppercase;"
                                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.15)'"
                                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)'">
                                        Register
                                    </button>
                                </div> -->

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-lg custom-btn">
                                    Register
                                </button>
                            </div>

                            <style>
                                .custom-btn {
                                    background: linear-gradient(135deg, #F05A25, #FF4500);
                                    color: white;
                                    padding: 12px 36px;
                                    border-radius: 30px;
                                    font-size: 18px;
                                    font-weight: 600;
                                    font-family: 'Arial', sans-serif;
                                    letter-spacing: 1px;
                                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                                    transition: all 0.4s ease-in-out;
                                    text-transform: uppercase;
                                    border: none;
                                    position: relative;
                                    overflow: hidden;
                                }

                                .custom-btn:hover {
                                    background: linear-gradient(135deg, #FF4500, #F05A25);
                                    transform: scale(1.05);
                                    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
                                }
                            </style>


                        </form>

                        <!-- PayPal Button Integration -->


                    </div>

                </div>
            </div>

        </div>
    </section>

    <style>
        .event-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            /* Space between logo and title */
            text-align: left;
        }

        .event-header img {
            width: 60px;
            /* Adjust size as needed */
            height: auto;
            object-fit: contain;
            animation: fadeInLeft 1s ease-in-out;
            /* Smooth entrance */
        }

        .contact-title {
            font-size: 2.5rem;
            /* Elegant size */
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            position: relative;
            text-shadow:
                2px 2px 4px rgba(0, 0, 0, 0.6),
                inset 3px 3px 5px rgba(255, 255, 255, 0.2);
            letter-spacing: 2px;
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
            background: linear-gradient(135deg, #F05A25 0%, #D4461C 100%);
            box-shadow: 0 5px 15px rgba(240, 90, 37, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-title:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(240, 90, 37, 0.6);
        }

        @media (max-width: 768px) {
            .event-header {
                flex-direction: column;
                text-align: center;
            }

            .event-header img {
                width: 50px;
            }
        }

        /* Subtle animation */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>

    <style>
        .section-title {
            color: #F05A25 !important;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            border-bottom: 3px solid #F05A25;
            display: inline-block;
            padding-bottom: 5px;
        }

        .custom-button {
            background: linear-gradient(135deg, #F05A25, #FF4500);
            color: white;
            padding: 12px 36px;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.4s ease-in-out;
        }

        .custom-button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection