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
                Payment Portal <span class="text-primary">(Tanzania)</span></h4>
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
                <form action="{{ route('payment.mobile') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="phone">Mobile Number</label>
                        <input type="phone" placeholder="Eg 2557121345678" required class="form-control"
                            name="phone">
                        <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
                    </div>

                    <div class="mt-5">
                        <h6>Amount : <span style="color: #F05A25 !important; font-weight: bold;">Tsh 120,000</span></h6>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-lg custom-btn">
                                Make Payment
                            </button>
                        </div>
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
