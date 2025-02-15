<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .payment-container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-btn {
            background-color: #F05A25;
            color: #fff;
            font-weight: bold;
            width: 100%;
        }

        .custom-btn:hover {
            background-color: #d94c20;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-12 text-center mt-5">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo/loder.png') }}" alt="WYAB Logo"
                            style="width: 120px; height: auto;">
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="hero-cap hero-cap2 text-center">
            {{-- <h2>Payment Portal <span class="text-primary">(Tanzania)</span></h2> --}}
            <h4 class="mt-4 mb-4 text-primary"
                style="color: #F05A25 !important; font-weight: bold; text-transform: uppercase; text-align: center; border-bottom: 3px solid #F05A25; display: inline-block; padding-bottom: 5px;">
                Payment Portal <span class="text-primary">(Non-Tanzania)</span></h4>
            <p class="mb-2 mt-2">Please make payment to complete registration</p>
        </div>
    </div>
    <div class="container mt-2 mb-5">
        <div class="row">
            <div class="offset-xl-3 offset-md-3 col-xl-6 col-md-6 col-12 text-center">
                @foreach ($methods as $method)
                    <img src="{{ asset($method['logo']) }}" alt="Airtel" width="80" style="margin: 0px 10px">
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="offset-xl-3 offset-md-3 col-xl-6 col-md-6 col-12">
                <form action="#">
                    <div class="mb-3">
                        <label for="card_number" class="form-label">Card Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="card_number"
                                placeholder="XXXX-XXXX-XXXX-XXXX" required>
                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expiry" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="expiry" placeholder="MM/YY" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="password" class="form-control" id="cvv" placeholder="***" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cardholder" class="form-label">Cardholder Name</label>
                        <input type="text" class="form-control" id="cardholder" placeholder="John Doe" required>
                    </div>

                    <div class="mt-4">
                        <h6>Amount: <span style="color: #F05A25; font-weight: bold;">USD 150</span></h6>
                    </div>

                    <div class="text-center mt-4 mb-5">
                        <button type="submit" class="btn btn-lg custom-btn">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
