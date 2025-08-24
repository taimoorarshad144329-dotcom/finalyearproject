@extends('admin.adminlayout')
<!-- 🟢 Alert placed before the main content starts -->
@section('alert')
    @if(session('success'))
        <div id="toastMessage" class="toast-message">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                let toast = document.getElementById('toastMessage');
                if (toast) {
                    toast.classList.add('hide');
                }
            }, 4000);
        </script>

        <style>
            .toast-message {
                position: fixed;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #1894ed;
                color: white;
                padding: 15px 25px;
                border-radius: 20px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                z-index: 9999;
                opacity: 1;
                transition: all 0.5s ease-in-out;
                font-weight: bold;
            }

            .toast-message.hide {
                opacity: 0;
                bottom: 0px;
            }
        </style>
    @endif
@endsection




@section('content')

<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        
    

<!-- Cars Box -->
<div class="col-sm-4 mt-5">
    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header">
            Cars
        </div>
        <div class="card-body">
            <h4 class="card-title">
                {{ $carsCount }}
            </h4>
            <a href="{{ route('car.index') }}" class="btn text-white">View</a>
        </div>
    </div>
</div>

<!-- Users Box -->
<div class="col-sm-4 mt-5">
    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <h4 class="card-title">
                {{ $usersCount }}
            </h4>
            <a href="{{ route('useradmin.index') }}" class="btn text-white">View</a>
        </div>
    </div>
</div>

<!-- Rental Cars Box -->
<div class="col-sm-4 mt-5">
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header">
            Rental Cars
        </div>
        <div class="card-body">
            <h4 class="card-title">
                {{ $rentalCount }}
            </h4>
            <a href="{{ route('admin.bookings.index') }}" class="btn text-white">View</a>
        </div>
    </div>
</div>

                {{-- <!-- Details -->
                <div class="mx-5 mt-5 text-center">
                    <!-- Table -->
                    <p class="bg-dark text-white p-2">
                        Cars Rental
                    </p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Car ID</th>
                                <th scope="col">name</th>
                                <th scope="col">Feature</th>
                                <th scope="col">Model</th>
                                <th scope="col">functionality</th>
                                <th scope="col">Seats</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">2</th>
                                <td> Toyota Carolla</td>
                                <td>AC,Automatic</td>
                                <td>XLI</td>
                                <td>Auto</td>
                                <td>5</td>
                                <td><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Details -->
            </div>
        </div> <!-- Div Close from header of row -->
      </div> <!-- Div Close from header of container-fluid -->
    <!-- Side Bar --> --}}

    
@endsection