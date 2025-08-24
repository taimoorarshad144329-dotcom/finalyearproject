<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        // Active cars list for frontend
        $cars = Car::query()->latest()->get();
        // return $cars;
        return view('rentnow', compact('cars'));
        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id'           => 'required|exists:cars,id',
            'pickup_location'  => 'required|string|max:255',
            'pickup_date'      => 'required|date',
            'pickup_time'      => 'required|date_format:H:i',
            'return_location'  => 'required|string|max:255',
            'return_date'      => 'required|date',
            'return_time'      => 'required|date_format:H:i',

            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email',
            'phone'            => 'required|string|max:50',
            'cnic'             => ['required','string','max:20','regex:/^\\d{5}-\\d{7}-\\d{1}$/'],
            'address'          => 'required|string|max:500',
            'city'             => 'required|string|max:100',
            'zip_code'         => 'required|string|max:20',
            'driving_license'  => 'required|string|max:100',
            'license_expiry'   => 'required|date|after:today',
            'special_requests' => 'nullable|string',
        ], [
            'cnic.regex' => 'CNIC format must be XXXXX-XXXXXXX-X',
        ]);


        $pickupAt = Carbon::parse($validated['pickup_date'].' '.$validated['pickup_time']);
$returnAt = Carbon::parse($validated['return_date'].' '.$validated['return_time']);

// Dates check
if ($returnAt->lte($pickupAt)) {
    return back()->withErrors(['return_date' => 'Return date/time must be after pickup date/time.'])->withInput();
}

// Get car
$car = Car::findOrFail($validated['car_id']);

// Calculate days (at least 1 day)
$days = $pickupAt->diffInDays($returnAt);
if ($days < 1) {
    $days = 1;
}

// Multiply with car price
$carPrice = $car->price ?? 0;
$total = $days * $carPrice;

// ✅ Debug test (remove after testing)
// dd($pickupAt, $returnAt, $days, $carPrice, $total);

// Save booking
Booking::create([
    'car_id'           => $car->id,
    'pickup_location'  => $validated['pickup_location'],
    'pickup_at'        => $pickupAt,
    'return_location'  => $validated['return_location'],
    'return_at'        => $returnAt,
    'full_name'        => $validated['full_name'],
    'email'            => $validated['email'],
    'phone'            => $validated['phone'],
    'cnic'             => $validated['cnic'],
    'address'          => $validated['address'],
    'city'             => $validated['city'],
    'zip_code'         => $validated['zip_code'],
    'driving_license'  => $validated['driving_license'],
    'license_expiry'   => $validated['license_expiry'],
    'special_requests' => $validated['special_requests'] ?? null,
    'status'           => 'pending',
    'total_amount'     => $total, // 👈 ye total save hoga
]);


        return redirect()->route('booking.index')->with('success', 'Your booking request has been submitted. We will contact you shortly!');
    }

    // Admin list
    public function adminIndex()
    {
        $bookings = Booking::with(['car','user'])->latest()->paginate(20);
        return view('admin.bookings.index', compact('bookings'));
    }





    public function approve($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'confirmed';
    $booking->save();

    return redirect()->back()->with('success', 'Booking confirmed successfully!');
}

public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'cancelled';
    $booking->save();

    return redirect()->back()->with('success', 'Booking cancelled successfully!');
}

public function dashboard()
{
    $carsCount = Car::count('id');
    $usersCount = User::count();
    $rentalCount = Booking::count(); // Rental cars ya bookings ka count

    // return $carsCount;
    return view('admin.dashboard', compact('carsCount', 'usersCount', 'rentalCount'));
}


}
