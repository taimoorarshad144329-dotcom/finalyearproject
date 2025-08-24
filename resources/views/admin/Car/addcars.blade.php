@extends('admin.adminlayout')

@section('content')
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Car</h3>

    <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="car_name">Car Name</label><small class="text-danger">
                @error('car_name')
                {{ $message }}
                @enderror
            </small>
            <input type="text" class="form-control @error('car_name') is-invalid @enderror" id="car_name" name="car_name" value="{{ old('car_name') }}">
        </div>
        

        <div class="form-group">
            <label for="car_model">Car Model</label><small class="text-danger">
                @error('car_model')
                {{ $message }}
                @enderror
            </small>
            <textarea class="form-control @error('car_model') is-invalid @enderror" name="car_model" id="car_model">{{ old('car_model') }}</textarea>
        </div>
        
        
        <div class="form-group">
            <label for="car_engine">Car Engine</label><small class="text-danger">
                @error('car_engine')
                {{ $message }}
                @enderror
            </small>
            <input type="text" class="form-control @error('car_engine') is-invalid @enderror" id="car_engine" name="car_engine" value="{{ old('car_engine') }}">
        </div>

        
        <div class="form-group">
            <label for="car_feature">Car Feature</label><small class="text-danger">
                @error('car_feature')
                {{ $message }}
                @enderror
            </small>
            <input type="text" class="form-control @error('car_feature') is-invalid @enderror" id="car_feature" name="car_feature" value="{{ old('car_feature') }}">
        </div>
        

        <div class="form-group">
            <label for="car_price">Car Price</label><small class="text-danger">
                @error('car_price')
                {{ $message }}
                @enderror
            </small>
            <input type="text" class="form-control @error('car_price') is-invalid @enderror" id="car_price" name="car_price" value="{{ old('car_price') }}">
        </div>
        

        <div class="form-group">
            <label for="car_seats">Car Seats</label><small class="text-danger">
                @error('car_seats')
                {{ $message }}
                @enderror
            </small>
            <input type="text" class="form-control @error('car_seats') is-invalid @enderror" id="car_seats" name="car_seats" value="{{ old('car_seats') }}">
        </div>
        

        <div class="form-group">
            <label for="car_image">Car Image</label><small class="text-danger">
                @error('car_image')
                {{ $message }}
                @enderror
            </small>
            <input type="file" class="form-control-file @error('car_image') is-invalid @enderror" id="car_image" name="car_image" value="{{ old('car_image') }}">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger" >Submit</button>
            <a href="{{ route('car.index') }}" class="btn btn-primary">Close</a>
        </div>

    </form>
</div>

@endsection