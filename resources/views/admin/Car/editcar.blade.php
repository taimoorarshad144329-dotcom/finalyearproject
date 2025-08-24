@extends('admin.adminlayout')

@section('content')
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Edit Cars Details</h3>
    
<form action="{{ route('car.update', $car->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="car_name">Car Name</label>
        <input type="text" name="car_name" class="form-control" 
               value="{{ old('car_name', $car->name) }}">
    </div>

    <div class="form-group">
        <label for="car_model">Car Model</label>
        <input type="text" name="car_model" class="form-control" 
               value="{{ old('car_model', $car->type) }}">
    </div>

    <div class="form-group">
        <label for="car_engine">Car Engine</label>
        <input type="text" name="car_engine" class="form-control" 
               value="{{ old('car_engine', $car->transmission) }}">
    </div>

    <div class="form-group">
        <label for="car_feature">Car Features</label>
        <input type="text" name="car_feature" class="form-control" 
               value="{{ old('car_feature', $car->features) }}">
    </div>

    <div class="form-group">
        <label for="car_price">Car Price</label>
        <input type="number" name="car_price" class="form-control" 
               value="{{ old('car_price', $car->price) }}">
    </div>

    <div class="form-group">
        <label for="car_seats">Car Seats</label>
        <input type="number" name="car_seats" class="form-control" 
               value="{{ old('car_seats', $car->seats) }}">
    </div>

    <div class="form-group">
        <label for="car_image">Car Image</label><br>
        <img src="{{ asset('upload/cars/image/' . $car->image) }}" 
             class="img-fluid img-thumbnail mb-2" width="150">
        <input type="file" name="car_image" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-danger">Update</button>
    <a href="{{ route('car.index') }}" class="btn btn-primary">Cancel</a>
</form>

</div>

@endsection