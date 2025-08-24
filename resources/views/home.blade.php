<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malik Motors</title>
    <link rel="stylesheet" href="{{ asset('css/manual-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
    <script src="{{ asset('js/manual-script.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.jpg') }}" alt="Malik Motors Logo" class="logo">
            <a href="{{ url('/') }}" class="header-link"><h1>Malik Motors</h1></a>
            
            <!-- NAVIGATION BAR-->
            <div class="nav-wrapper">
                <nav class="navigation">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ url('/contact-us') }}">Contact Us</a>
                    <a href="{{ route('booking.index') }}">Rent Now</a>
                </nav>

                @if(Auth::check())
                    <a href="{{ url('/my-account') }}" class="register">My Account</a>
                @else
                    <button class="register" data-bs-toggle="modal" data-bs-target="#registrationModal">Registration</button>
                    <button class="login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                @endif
        </div>
    </div>
</div>

<!-- Include centralized modals -->
@include('components.modals')

    <div class="section">
        100% trusted car rental platform in Pakistan
    </div>  
    <div class="custom-container">
        <div class="left-rectangle">
            <h3>Our Premium Garage</h3>
            <p>Experience luxury with our latest models featuring advanced comfort and technology.</p>
            <a href="{{ url('/rental-deals') }}"><button>View Vehicles</button></a>
        </div>
        <div class="right-rectangle">
            <img src="{{ asset('images/header-car.jpg') }}" alt="Premium Rental Vehicle">
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
