<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Dashboard</title>

    <!-- Boostrap CSS -->
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

     <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- Google Font -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">

       <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
        @stack('styles')
</head>
<body>
    <!--Start Top Navbar -->
    <nav class="navbar navbar-dark  p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('dashboard') }}">Malik Motor<small class="text-white">   Admin Area</small></a>

    </nav>
    <!--End Top Navbar -->

    <!-- Side Bar -->
     <div class="container-fluid mb-5" style="margin-top: 0px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('car.index') }}" class="nav-link {{ request()->routeIs('car.index') ? 'active' : '' }}"><i class="fab fa-accessible-icon"></i> Cars</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}" class="nav-link {{ request()->routeIs('admins.index') ? 'active' : '' }}"><i class="fab fa-accessible-icon"></i>All Admin</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('student') ? 'active' : '' }}"><i class="fas fa-users"></i> Rental cars</a>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a href="{{ route('useradmin.index') }}" class="nav-link"><i class="fas fa-table"></i> Users</a>
                        </li>
                        
                        </li>
                        
                        <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-start w-100 px-0">
                        <i class="fas fa-sign-out-alt"></i> Logout
                     </button>
    </form>
</li>

                    </ul>
                </div>
                 <!-- Vertical Divider -->
                {{-- <div class="vertical-divider d-none d-md-block"></div> --}}
            </nav>
            <!-- End Side Bar -->



            
            @yield('content')
            
            
            
            

            
            
            
            <!-- Jquery and boostrap Javascript -->
            <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Fontawesome JS -->
    <script type="text/javascript" src="{{ asset('js/all.min.js') }}"></script>
    
    


    
    @yield('alert')

    @stack('scripts')

</body>
</html>