<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Malik Motors</title>
    <link rel="stylesheet" href="{{ asset('css/manual-styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <style>
        .account-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .account-header {
            background: linear-gradient(135deg, #c1121f, #a10e1a);
            color: white;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .account-header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        
        .account-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        .account-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .sidebar {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            height: fit-content;
        }
        
        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            background: #c1121f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
        }
        
        .nav-menu li {
            margin-bottom: 10px;
        }
        
        .nav-menu a {
            display: block;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .nav-menu a:hover, .nav-menu a.active {
            background: #c1121f;
            color: white;
        }
        
        .content-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .info-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
        }
        
        .info-value {
            color: #212529;
        }
        
        .booking-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .booking-card:hover {
            border-color: #c1121f;
            box-shadow: 0 2px 8px rgba(193, 18, 31, 0.1);
        }
        
        .booking-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background: #d4edda;
            color: #155724;
        }
        
        .status-completed {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        .btn-primary {
            background: #c1121f;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }
        
        .btn-primary:hover {
            background: #a10e1a;
            color: white;
        }
        
        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }
        
        .logout-btn:hover {
            background: #c82333;
        }
        
        @media (max-width: 768px) {
            .account-grid {
                grid-template-columns: 1fr;
            }
            
            .account-header {
                padding: 20px;
            }
            
            .account-header h1 {
                font-size: 2rem;
            }
        }
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
                <a href="{{ url('/my-account') }}" class="register">My Account</a>
            </div>
        </div>
    </div>

    <div class="account-container">
        <div class="account-header">
            <h1>My Account</h1>
            <p>Manage your profile, bookings, and preferences</p>
        </div>

        <div class="account-grid">
            <div class="sidebar">
                <div class="profile-section">
                    <div class="profile-avatar">
                        {{ substr(Auth::user()->name ?? 'Guest', 0, 1) }}
                    </div>
                    <h3>{{ Auth::user()->name ?? 'Guest User' }}</h3>
                    <p>{{ Auth::user()->email ?? 'guest@example.com' }}</p>
                    <p>{{ Auth::user()->role ?? 'guest@example.com' }}</p>
                </div>

                <ul class="nav-menu">
                    <li><a href="#profile" class="active"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="#bookings"><i class="fas fa-car"></i> My Bookings</a></li>
                    <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>

            <div class="content-section">
                <div id="profile">
                    <h2>Personal Information</h2>
                    <div class="info-card">
                        <div class="info-row">
                            <span class="info-label">Full Name:</span>
                            <span class="info-value">{{ Auth::user()->name ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email Address:</span>
                            <span class="info-value">{{ Auth::user()->email ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Phone Number:</span>
                            <span class="info-value">{{ Auth::user()->phone ?? '+92-xxx-xxxxxxx' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Member Since:</span>
                            <span class="info-value">{{ optional(Auth::user())->created_at ? optional(Auth::user())->created_at->format('F j, Y') : 'Recently' }}</span>
                        </div>
                    </div>

                    <h3>Address Information</h3>
                    <div class="info-card">
                        <div class="info-row">
                            <span class="info-label">Address:</span>
                            <span class="info-value">{{ Auth::user()->address ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">City:</span>
                            <span class="info-value">{{ Auth::user()->city ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Country:</span>
                            <span class="info-value">Pakistan</span>
                        </div>
                    </div>

                    <a href="#" class="btn-primary">Edit Profile</a>
                </div>

                <div id="bookings" style="display: none;">
                    <h2>My Bookings</h2>
                    <div class="booking-card">
                        <h4>Toyota Corolla</h4>
                        <p><strong>Booking ID:</strong> #BK001</p>
                        <p><strong>Pickup:</strong> March 15, 2025 at 10:00 AM</p>
                        <p><strong>Drop-off:</strong> March 18, 2025 at 10:00 AM</p>
                        <p><strong>Total:</strong> Rs15,000</p>
                        <span class="booking-status status-active">Active</span>
                    </div>
                    
                    <div class="booking-card">
                        <h4>Honda Civic</h4>
                        <p><strong>Booking ID:</strong> #BK002</p>
                        <p><strong>Pickup:</strong> February 20, 2025 at 2:00 PM</p>
                        <p><strong>Drop-off:</strong> February 22, 2025 at 2:00 PM</p>
                        <p><strong>Total:</strong> Rs9,000</p>
                        <span class="booking-status status-completed">Completed</span>
                    </div>
                </div>

                <div id="settings" style="display: none;">
                    <h2>Account Settings</h2>
                    <div class="info-card">
                        <h4>Notification Preferences</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Email notifications for booking confirmations</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">SMS notifications for booking updates</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Marketing emails and special offers</label>
                        </div>
                    </div>
                </div>

                <div id="payment" style="display: none;">
                    <h2>Payment Methods</h2>
                    <div class="info-card">
                        <h4>Saved Payment Methods</h4>
                        <p>No payment methods saved yet.</p>
                        <a href="#" class="btn-primary">Add Payment Method</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-menu a');
            const contentSections = ['profile', 'bookings', 'settings', 'payment'];
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Hide all content sections
                    contentSections.forEach(section => {
                        const element = document.getElementById(section);
                        if (element) {
                            element.style.display = 'none';
                        }
                    });
                    
                    // Show selected section
                    const targetSection = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetSection);
                    if (targetElement) {
                        targetElement.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>
