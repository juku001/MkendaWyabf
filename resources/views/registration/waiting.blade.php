<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
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
                Waiting for Payment</h4>
            <p class="mb-2 mt-2">Please make payment and see status here</p>
        </div>
    </div>

    <div class="container mt-5">
        <div style="height: 30vh" class="text-center">
            <h1 id="payment-status" style="color: red;">Not Paid</h1>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script>
        function checkPaymentStatus() {
            $.get("{{ url('/registration/payment-status/' . $user_id) }}", function(response) {
                if (response.status === "paid") {
                    $("#payment-status").text("Paid").css("color", "green"); // Update text & color
                }
            });
        }

        // Run check every 5 seconds
        setInterval(checkPaymentStatus, 5000);
    </script>

</body>

</html>
