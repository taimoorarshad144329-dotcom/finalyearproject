<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // User Model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get only admins (for now sab users ko admin maan rahe)
        $admins = User::where('role','admin')->get();

        return view('admin.Admin.admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Admin.addadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'ad_name' => 'required|string|max:255',
        'role' => 'required',
        'ad_email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back() // wapas same page par bhej dega
            ->withErrors($validator) // error messages le jayega
            ->withInput(); // purana input form me wapas fill hoga
    }

    User::create([
        'name' => $request->ad_name,
        'email' => $request->ad_email,
        'password' => Hash::make($request->password),
        'role' => $request->role
    ]);

    if($request->role == 'admin'){

    
    return redirect()->route('admins.index')->with('success', 'Admin added successfully!');
    }elseif($request->role == 'user'){
      return redirect()->route('useradmin.index')->with('success', 'Admin added successfully!');  
    }
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::findOrFail($id);

        return view('admin.Admin.editadmin', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'ad_name' => 'required|string|max:255',
            'role' => 'required',
            'ad_email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->name = $request->ad_name;
        $admin->role = $request->role;
        $admin->email = $request->ad_email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully!');
    }



    public function userindex(){
        $admins = User::where('role','user')->get();

        return view('admin.user.alluser', compact('admins'));
    }
}
