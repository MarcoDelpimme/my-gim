<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function index()
    {

        $bookings = Booking::with('users', 'courses')->all();

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Booking $booking)
    {
    }

    public function edit(Booking $booking)
    {
    }

    public function update(Request $request, Booking $booking)
    {

        $booking->status = 'accepted';
        $booking->save();


        return redirect()->route('admin.bookings.index');
    }

    public function destroy(Booking $booking)
    {
    }
}
