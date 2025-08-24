<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('booking.contact');
    }

    public function submit(Request $request)
    {
        // Save to DB or send email (future extension)
        return back()->with('success', 'Your message has been sent!');
    }
}
