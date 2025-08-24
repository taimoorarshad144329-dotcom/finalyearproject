<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerJson(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first(),
        ], 401);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'email_verified_at' => now(),
    ]);

    Auth::login($user);

    return response()->json([
        'status' => 'success',
        'message' => 'Registration successful!',
        'redirect' => url('/my-account'),
    ]);
}

public function loginJson(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first(),
        ], 401);
    }

   if (Auth::attempt($request->only('email', 'password'))) {
    $user = Auth::user();
    $request->session()->regenerate();

    if ($user->role === 'admin') {
        return response()->json([
            'status'   => 'success',
            'message'  => 'Welcome Admin!',
            'redirect' => route('dashboard') // admin dashboard route
        ]);
    } elseif ($user->role === 'user') {
        return response()->json([
            'status'   => 'success',
            'message'  => 'Login successful!',
            'redirect' => route('my-account') // user account page
        ]);
    } else {
        return response()->json([
        'status' => 'error',
        'message' => 'Invalid credentials',
    ], 401);
    }
}


    
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
