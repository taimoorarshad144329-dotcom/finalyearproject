<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('admin.Car.car',compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Car.addcars');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $validateCar = Validator::make(
        $request->all(),
        [
            'car_name'     => 'required|string|max:255',
            'car_model'    => 'required|string|max:255',
            'car_engine'   => 'required|string|max:255',
            'car_feature'  => 'required|string|max:255',
            'car_price'    => 'required|integer',
            'car_seats'    => 'required|integer',
            'car_image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]
    );

    if ($validateCar->fails()) {
        return redirect()->back()
            ->withErrors($validateCar)
            ->withInput();
    }

    // Image upload
    $img = $request->car_image;
    $ext = $img->getClientOriginalExtension();
    $car_image = time(). '.' . $ext;
    $img->move(public_path('upload/cars/image'), $car_image);

    // Car create
    $car = Car::create([
        'name'    => $request->car_name,
        'type'   => $request->car_model,
        'transmission'  => $request->car_engine,
        'features' => $request->car_feature,
        'price'   => $request->car_price,
        'seats'   => $request->car_seats,
        'image'   => $car_image,
    ]);

    if ($car) {
        return redirect()->route('car.index')->with([
            'success' => 'Car Added Successfully'
        ]);
    } else {
        return redirect()->back()->with([
            'error' => 'Something went wrong, try again!'
        ]);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id); // record fetch karega
        return view('admin.Car.editcar', compact('car')); 
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $car = Car::findOrFail($id);

    // validation
    $validateCar = Validator::make(
        $request->all(),
        [
            'car_name'     => 'required|string|max:255',
            'car_model'    => 'required|string|max:255',
            'car_engine'   => 'required|string|max:255',
            'car_feature'  => 'required|string|max:255',
            'car_price'    => 'required|integer',
            'car_seats'    => 'required|integer',
            'car_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]
    );

    if ($validateCar->fails()) {
        return redirect()->back()
            ->withErrors($validateCar)
            ->withInput();
    }

    // agar image update hui to replace kar do
    if ($request->hasFile('car_image')) {
        $img = $request->car_image;
        $ext = $img->getClientOriginalExtension();
        $car_image = time() . '.' . $ext;
        $img->move(public_path('upload/cars/image'), $car_image);

        // purani image delete karna optional hai
        if ($car->image && file_exists(public_path('upload/cars/image/' . $car->image))) {
            unlink(public_path('upload/cars/image/' . $car->image));
        }

        $car->image = $car_image;
    }

    // update fields
    $car->name         = $request->car_name;
    $car->type         = $request->car_model;
    $car->transmission = $request->car_engine;
    $car->features     = $request->car_feature;
    $car->price        = $request->car_price;
    $car->seats        = $request->car_seats;

    $car->save();

    if($car){
        return redirect()->route('car.index')->with([
            'success' => 'Car Updated Successfully'
        ]);

    }else{

        return redirect()->route('car.index')->with([
            'success' => 'Car Does not update Successfully'
        ]);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $car = Car::findOrFail($id);

    // Delete image from folder
    $imagePath = public_path('upload/cars/image/' . $car->image);
    if (file_exists($imagePath) && $car->image) {
        unlink($imagePath);
    }

    // Delete record
    $car->delete();

    return redirect()->route('car.index')->with([
        'success' => 'Car deleted successfully!'
    ]);
}

}
