
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malik Motors</title>
    <link rel="stylesheet" href="{{ asset('css/manual-styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Malik Motors Rent now Custom Styles */
        .mm-booking-container { max-width: 1200px; margin: 0 auto; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .mm-step-indicator { display: flex; justify-content: center; margin-bottom: 30px; }
        .mm-step { text-align: center; padding: 0 20px; position: relative; }
        .mm-step-number { width: 30px; height: 30px; background-color: #e9ecef; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 5px; font-weight: bold; color: #6c757d; }
        .mm-step.active .mm-step-number { background-color: #c1121f; color: #fff; }
        .mm-step-title { font-size: 14px; color: #6c757d; text-transform: uppercase; font-weight: 500; }
        .mm-step.active .mm-step-title { color: #c1121f; }
        .mm-vehicle-section { margin-bottom: 40px; }
        .mm-section-title { font-size: 24px; margin-bottom: 20px; color: #212529; font-weight: 600; }
        .mm-vehicle-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .mm-vehicle-card { border: 1px solid #dee2e6; border-radius: 8px; padding: 20px; transition: all 0.3s ease; }
        .mm-vehicle-card:hover { border-color: #c1121f; box-shadow: 0 5px 15px rgba(193, 18, 31, 0.1); }
        .mm-vehicle-name { font-size: 18px; font-weight: 600; margin-bottom: 5px; }
        .mm-vehicle-type { color: #6c757d; font-size: 14px; margin-bottom: 10px; }
        .mm-vehicle-price { font-size: 16px; font-weight: 600; color: #c1121f; margin: 10px 0; }
        .mm-btn-select { background-color: #c1121f; color: #fff; border: none; border-radius: 5px; padding: 8px 20px; font-weight: 500; transition: all 0.3s; width: 100%; }
        .mm-btn-select:hover { background-color: #a10e1a; transform: translateY(-2px); }
        .mm-features-section { margin: 40px 0; }
        .mm-features-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .mm-feature-item { margin-bottom: 15px; }
        .mm-feature-title { font-weight: 600; margin-bottom: 5px; }
        .mm-feature-desc { color: #6c757d; font-size: 14px; }
        .mm-divider { height: 1px; background-color: #dee2e6; margin: 30px 0; }
        .mm-help-section { background-color: #f8f9fa; padding: 20px; border-radius: 8px; }
        .mm-vehicle-image { width: 100%; height: 200px; object-fit: cover; border-radius: 8px; margin-bottom: 15px; }
        .mm-vehicle-content { padding: 0; }
        .mm-vehicle-details { display: flex; flex-wrap: wrap; gap: 10px; margin: 10px 0; }
        .mm-detail-item { display: flex; align-items: center; gap: 5px; font-size: 14px; color: #6c757d; }
        .mm-detail-item i { color: #c1121f; }
        .mm-vehicle-features { display: flex; flex-wrap: wrap; gap: 5px; margin: 10px 0; }
        .mm-feature-badge { background-color: #f8f9fa; color: #495057; padding: 4px 8px; border-radius: 12px; font-size: 12px; font-weight: 500; }
        .btn-primary { background-color: #c1121f !important; border-color: #c1121f !important; transition: all 0.3s ease; }
        .btn-primary:hover { background-color: #a10e1a !important; border-color: #a10e1a !important; transform: translateY(-2px); box-shadow: 0 4px 8px rgba(193, 18, 31, 0.3); }
        .continue-confirmation-btn { background-color: #c1121f !important; border-color: #c1121f !important; }
        .form-required { color: #c1121f; }
    </style>
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
@include('components.modals')

<div class="section">100% trusted car rental platform in Pakistan</div>

<!-- Alerts -->
<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your submission:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<!-- Booking Form (wrap ALL steps) -->
<form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
    @csrf
    <!-- hidden field to hold selected car id -->
    <input type="hidden" name="car_id" id="car_id" />

    <div class="mm-booking-container">
        <h1 class="text-center mb-4">Select a Vehicle</h1>

        <!-- Stepper -->
        <div class="mm-step-indicator">
            <div class="mm-step active" id="step1">
                <div class="mm-step-number">1</div>
                <div class="mm-step-title">Choose Car</div>
            </div>
            <div class="mm-step" id="step2">
                <div class="mm-step-number">2</div>
                <div class="mm-step-title">Trip Details</div>
            </div>
            <div class="mm-step" id="step3">
                <div class="mm-step-number">3</div>
                <div class="mm-step-title">Personal info</div>
            </div>
            <div class="mm-step" id="step4">
                <div class="mm-step-number">4</div>
                <div class="mm-step-title">Review & Submit</div>
            </div>
        </div>

<!-- Vehicles -->
<div class="mm-vehicle-section" id="vehicleSection">
    <div class="mm-vehicle-grid">
        @forelse($cars ?? [] as $car)
            <div class="mm-vehicle-card">
                <img src="{{ $car->image ? asset('upload/cars/image/'.$car->image) : asset('images/placeholder-car.jpg') }}" 
                     alt="{{ $car->name }}" 
                     class="mm-vehicle-image" />

                <div class="mm-vehicle-content">
                    <h3 class="mm-vehicle-name">{{ $car->name }}</h3>
                    <div class="mm-vehicle-type">
                        {{ $car->type ?? 'Vehicle' }} • {{ $car->seats ?? 5 }} seats • {{ ucfirst($car->transmission ?? 'automatic') }}
                    </div>

                    <div class="mm-vehicle-details">
                        <div class="mm-detail-item"><i class="fas fa-gas-pump"></i> {{ ucfirst($car->fuel_type ?? 'petrol') }}</div>
                        <div class="mm-detail-item"><i class="fas fa-snowflake"></i> AC</div>
                        <div class="mm-detail-item"><i class="fas fa-bluetooth"></i> Bluetooth</div>
                        <div class="mm-detail-item"><i class="fas fa-shield-alt"></i> Airbags</div>
                    </div>

                    <div class="mm-vehicle-price">Rs{{ number_format($car->price ?? 0) }}/day</div>

                    <div class="mm-vehicle-features">
                        <span class="mm-feature-badge">GPS</span>
                        <span class="mm-feature-badge">Insurance</span>
                        <span class="mm-feature-badge">24/7 Support</span>
                    </div>

                    <button type="button" 
                            class="mm-btn-select" 
                            data-car-id="{{ $car->id }}" 
                            data-car-name="{{ $car->name }}" 
                            data-car-type="{{ $car->type ?? 'Vehicle' }}" 
                            data-car-price="{{ $car->price ?? 0 }}" 
                            data-car-image="{{ $car->image ? asset('upload/cars/image/'.$car->image) : asset('images/placeholder-car.jpg') }}">
                        Select This Car
                    </button>
                </div>
            </div>
        @empty
            <!-- Fallback static cards if no cars in DB -->
            <div class="alert alert-info">No cars found in database. Please add cars from Admin &raquo; Cars.</div>
        @endforelse
    </div>
</div>

        <!-- Why choose us -->
        <div class="mm-features-section" id="whySection">
            <h2 class="mm-section-title">Why Choose Us</h2>
            <div class="mm-features-grid">
                <div class="mm-feature-item"><h5 class="mm-feature-title">Flexible Rental Options</h5><p class="mm-feature-desc">Choose from hourly, daily, or weekly rentals to fit your needs.</p></div>
                <div class="mm-feature-item"><h5 class="mm-feature-title">No Hidden Fees</h5><p class="mm-feature-desc">Transparent pricing with no surprise charges.</p></div>
                <div class="mm-feature-item"><h5 class="mm-feature-title">24/7 Customer Support</h5><p class="mm-feature-desc">Our customer service team is available around the clock.</p></div>
                <div class="mm-feature-item"><h5 class="mm-feature-title">Free Cancellation</h5><p class="mm-feature-desc">Cancel up to 24 hours before pickup with no penalty.</p></div>
            </div>
        </div>
        <div class="mm-divider" id="divider"></div>
        <div class="mm-help-section" id="helpSection">
            <h5 class="mb-3">Need Help?</h5>
            <div class="d-flex align-items-center"><i class="fas fa-phone-alt me-3" style="color:#c1121f;"></i><div><p class="mb-0">Call Us</p><h6 class="mb-0">+92-324-867000</h6></div></div>
        </div>
    </div>

    <!-- Trip Details -->
    <div class="mm-trip-details" id="tripDetailsSection" style="display:none;">
        <div class="mm-booking-container">
            <h2 class="mm-section-title">Trip Details</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h5>Pickup Information</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="pickupLocation" class="form-label">Pickup Location <span class="form-required">*</span></label>
                                <input type="text" class="form-control" id="pickupLocation" name="pickup_location" value="{{ old('pickup_location') }}" placeholder="Enter pickup location" required />
                            </div>
                            <div class="mb-3">
                                <label for="pickupDate" class="form-label">Pickup Date <span class="form-required">*</span></label>
                                <input type="date" class="form-control" id="pickupDate" name="pickup_date" value="{{ old('pickup_date') }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="pickupTime" class="form-label">Pickup Time <span class="form-required">*</span></label>
                                <input type="time" class="form-control" id="pickupTime" name="pickup_time" value="{{ old('pickup_time') }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h5>Return Information</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="returnLocation" class="form-label">Return Location <span class="form-required">*</span></label>
                                <input type="text" class="form-control" id="returnLocation" name="return_location" value="{{ old('return_location') }}" placeholder="Enter return location" required />
                            </div>
                            <div class="mb-3">
                                <label for="returnDate" class="form-label">Return Date <span class="form-required">*</span></label>
                                <input type="date" class="form-control" id="returnDate" name="return_date" value="{{ old('return_date') }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="returnTime" class="form-label">Return Time <span class="form-required">*</span></label>
                                <input type="time" class="form-control" id="returnTime" name="return_time" value="{{ old('return_time') }}" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h5>Selected Vehicle</h5></div>
                        <div class="card-body">
                            <div id="selectedVehicleDetails"><!-- Vehicle details injected by JS --></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-secondary me-2" onclick="goBackToVehicles()">Back to Vehicles</button>
                    <button type="button" class="btn btn-primary" onclick="proceedToPersonalInfo()">Continue to Personal Info</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Personal Info -->
    <div class="mm-personal-info" id="personalInfoSection" style="display:none;">
        <div class="mm-booking-container">
            <h2 class="mm-section-title">Personal Details</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header"><h5>Contact Information</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fullName" class="form-label">Full Name <span class="form-required">*</span></label>
                                    <input type="text" class="form-control" id="fullName" name="full_name" value="{{ old('full_name') }}" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address <span class="form-required">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number <span class="form-required">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cnic" class="form-label">CNIC Number <span class="form-required">*</span></label>
                                    <input type="text" class="form-control" id="cnic" name="cnic" value="{{ old('cnic') }}" placeholder="XXXXX-XXXXXXX-X" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address <span class="form-required">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City <span class="form-required">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zipCode" class="form-label">ZIP Code <span class="form-required">*</span></label>
                                    <input type="text" class="form-control" id="zipCode" name="zip_code" value="{{ old('zip_code') }}" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="drivingLicense" class="form-label">Driving License Number <span class="form-required">*</span></label>
                                <input type="text" class="form-control" id="drivingLicense" name="driving_license" value="{{ old('driving_license') }}" required />
                            </div>
                            <div class="mb-3">
                                <label for="licenseExpiry" class="form-label">License Expiry Date <span class="form-required">*</span></label>
                                <input type="date" class="form-control" id="licenseExpiry" name="license_expiry" value="{{ old('license_expiry') }}" required />
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="termsAgreement" required />
                                    <label class="form-check-label" for="termsAgreement">I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ageConfirmation" required />
                                    <label class="form-check-label" for="ageConfirmation">I confirm that I am 21+ with a valid driving license</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header"><h5>Additional Information</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="specialRequests" class="form-label">Special Requests or Notes</label>
                                <textarea class="form-control" id="specialRequests" name="special_requests" rows="3" placeholder="Any special requirements or notes...">{{ old('special_requests') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-secondary me-2" onclick="goBackToTripDetails()">Back to Trip Details</button>
                        <button type="button" class="btn btn-primary continue-confirmation-btn" onclick="proceedToConfirmation()">Continue to Review</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Review & Submit -->
    <div class="mm-confirmation" id="confirmationSection" style="display:none;">
        <div class="mm-booking-container">
            <h2 class="mm-section-title">Review your booking</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header"><h6>Selected Vehicle</h6></div>
                                <div class="card-body"><div id="confirmationVehicleDetails"><!-- injected --></div></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header"><h6>Trip Summary</h6></div>
                                <div class="card-body"><div id="confirmationTripDetails"><!-- injected --></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header"><h6>Contact Information</h6></div>
                        <div class="card-body"><div id="confirmationContactDetails"><!-- injected --></div></div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="goBackToPersonalInfo()">Back to Personal Info</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check me-2"></i>Confirm & Submit Booking</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set today's date as min for date inputs
        const today = new Date().toISOString().split('T')[0];
        const pickupDate = document.getElementById('pickupDate');
        const returnDate = document.getElementById('returnDate');
        if (pickupDate) pickupDate.setAttribute('min', today);
        if (returnDate) returnDate.setAttribute('min', today);

        // Wire select buttons
        document.querySelectorAll('.mm-btn-select').forEach(btn => {
            btn.addEventListener('click', function () {
                const carId = this.dataset.carId;
                const carName = this.dataset.carName;
                const carType = this.dataset.carType;
                const carPrice = this.dataset.carPrice;
                const carImage = this.dataset.carImage;
                selectCar(carId, carName, carType, carPrice, carImage);
            });
        });
    });

    function selectCar(carId, carName, carType, carPrice, carImage) {
        // Put selected car id
        document.getElementById('car_id').value = carId;

        // Hide sections
        document.getElementById('vehicleSection').style.display = 'none';
        document.getElementById('whySection').style.display = 'none';
        document.getElementById('divider').style.display = 'none';
        document.getElementById('helpSection').style.display = 'none';

        // Update stepper
        document.getElementById('step1').classList.remove('active');
        document.getElementById('step2').classList.add('active');

        // Show Trip details
        document.getElementById('tripDetailsSection').style.display = 'block';

        // Fill vehicle preview
        const vehicleDetails = document.getElementById('selectedVehicleDetails');
        vehicleDetails.innerHTML = `
            <div class="row g-3 align-items-center">
                <div class="col-md-4"><img src="${carImage}" alt="${carName}" class="mm-vehicle-image" style="height:150px;"></div>
                <div class="col-md-8">
                    <h4 class="mb-1">${carName}</h4>
                    <p class="text-muted mb-2">${carType}</p>
                    <h5 class="text-danger mb-0">Rs${Number(carPrice).toLocaleString()}/day</h5>
                </div>
            </div>`;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function goBackToVehicles() {
        document.getElementById('tripDetailsSection').style.display = 'none';
        document.getElementById('step2').classList.remove('active');
        document.getElementById('step1').classList.add('active');
        document.getElementById('vehicleSection').style.display = 'block';
        document.getElementById('whySection').style.display = 'block';
        document.getElementById('divider').style.display = 'block';
        document.getElementById('helpSection').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function proceedToPersonalInfo() {
        const pickupLocation = document.getElementById('pickupLocation').value.trim();
        const pickupDate = document.getElementById('pickupDate').value;
        const pickupTime = document.getElementById('pickupTime').value;
        const returnLocation = document.getElementById('returnLocation').value.trim();
        const returnDate = document.getElementById('returnDate').value;
        const returnTime = document.getElementById('returnTime').value;

        if (!pickupLocation || !pickupDate || !pickupTime || !returnLocation || !returnDate || !returnTime) {
            alert('Please fill in all required trip fields before proceeding.');
            return;
        }

        const pickup = new Date(pickupDate + 'T' + pickupTime);
        const returnD = new Date(returnDate + 'T' + returnTime);
        if (returnD <= pickup) {
            alert('Return date/time must be after pickup date/time.');
            return;
        }

        document.getElementById('tripDetailsSection').style.display = 'none';
        document.getElementById('step2').classList.remove('active');
        document.getElementById('step3').classList.add('active');
        document.getElementById('personalInfoSection').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function goBackToTripDetails() {
        document.getElementById('personalInfoSection').style.display = 'none';
        document.getElementById('step3').classList.remove('active');
        document.getElementById('step2').classList.add('active');
        document.getElementById('tripDetailsSection').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function goBackToPersonalInfo() {
        document.getElementById('confirmationSection').style.display = 'none';
        document.getElementById('step4').classList.remove('active');
        document.getElementById('step3').classList.add('active');
        document.getElementById('personalInfoSection').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function proceedToConfirmation() {
        const fullName = document.getElementById('fullName').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const address = document.getElementById('address').value.trim();
        if (!fullName || !email || !phone || !address) {
            alert('Please fill in all required personal info fields.');
            return;
        }

        // Move to review screen
        document.getElementById('personalInfoSection').style.display = 'none';
        document.getElementById('step3').classList.remove('active');
        document.getElementById('step4').classList.add('active');
        document.getElementById('confirmationSection').style.display = 'block';
        populateConfirmationDetails();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function populateConfirmationDetails() {
        // Vehicle
        document.getElementById('confirmationVehicleDetails').innerHTML = document.getElementById('selectedVehicleDetails').innerHTML;
        // Trip
        const pickupLocation = document.getElementById('pickupLocation').value;
        const pickupDate = document.getElementById('pickupDate').value;
        const pickupTime = document.getElementById('pickupTime').value;
        const returnLocation = document.getElementById('returnLocation').value;
        const returnDate = document.getElementById('returnDate').value;
        const returnTime = document.getElementById('returnTime').value;
        document.getElementById('confirmationTripDetails').innerHTML = `
            <div class="text-start">
                <p><strong>Pickup:</strong> ${pickupLocation}</p>
                <p><strong>Pickup Date:</strong> ${formatDate(pickupDate)} at ${pickupTime}</p>
                <p><strong>Return:</strong> ${returnLocation}</p>
                <p><strong>Return Date:</strong> ${formatDate(returnDate)} at ${returnTime}</p>
            </div>`;
        // Contact
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const city = document.getElementById('city').value;
        document.getElementById('confirmationContactDetails').innerHTML = `
            <div class="text-start">
                <p><strong>Name:</strong> ${fullName}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Phone:</strong> ${phone}</p>
                <p><strong>City:</strong> ${city}</p>
            </div>`;
    }

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    }
</script>
</body>
</html>
