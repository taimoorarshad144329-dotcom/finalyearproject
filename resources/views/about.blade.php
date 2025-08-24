<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Malik Motors</title>
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
                    <a href="{{ url('/rent-now') }}">Rent Now</a>
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
    <div class="car-rental-section">
        <div class="content-container">
            <div class="text-content">
                <h1>How it works</h1>
                <p>Renting a car with us is simple! Choose your vehicle, pick your dates, and complete your booking. We'll handle the rest, ensuring a smooth start to your journey.</p>
                
                <div class="step">
                    <h2>Choose Location</h2>
                    <p>Select from a variety of pick-up locations that best suit your needs, whether it's close to home, work, or airport.</p>
                </div>
                
                <div class="step">
                    <h2>Pick-up Date</h2>
                    <p>Choose the exact date and time for your car pick-up, ensuring that your vehicle is ready when you need it.</p>
                </div>
                
                <div class="step">
                    <h2>Book your Car</h2>
                    <p>Complete your booking with just a few clicks, and we'll prepare your vehicle to ensure a hassle-free pick-up.</p>
                </div>
                
                <div class="popular-deals">
                    <h2>Brands we got at Malik Motors!</h2>
                    <p>Explore our top Malik Motors deals, handpicked to give you the best value and experience. Book now and drive your favorite ride at an incredible rate!</p>
                    
                    <div class="popular-brands">
                        <div class="brand"><a href="{{ url('/rental-deals') }}">Toyota</a></div>
                        <div class="brand"><a href="{{ url('/rental-deals') }}">Honda</a></div>
                        <div class="brand"><a href="{{ url('/rental-deals') }}">Suzuki</a></div>
                        <div class="brand"><a href="{{ url('/rental-deals') }}">KIA</a></div>
                        <div class="brand"><a href="{{ url('/rental-deals') }}">Hyundai</a></div>
                    </div>
                </div>
            </div>
            
            <div class="image-content">
                <img src="{{ asset('images/red-edition-audi-luxury-car-jdc.png') }}" alt="Luxury Car for Rent" class="floating-image">
                <div class="image-overlay">
                    <h3>Premium Selection</h3>
                    <p>Experience the finest vehicles in our fleet</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
