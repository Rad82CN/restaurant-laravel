<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index() {
        // getting logged in user
        $user = User::find(auth()->id());

        // getting all the bookings of the logged in user
        $bookings = $user->bookings()->get();

        return view('booking.bookings', compact('bookings'));
    }

    public function create() {
        return view('booking.create-booking');
    }

    public function store(BookingStoreRequest $request) {
        $validated = $request->validated();

        // filling the user_id using the id of the logged in user
        $validated['user_id'] = auth()->id();

        Booking::create($validated);

        return redirect()->route('booking.index')->with('success', 'You successfully reserved a table');
    }

    public function edit($booking) {
        $booking = Booking::findOrFail($booking);

        return view('booking.edit-booking', compact('booking'));
    }

    public function update($booking, BookingUpdateRequest $request) {
        $booking = Booking::findOrFail($booking);

        $validated = $request->validated();

        // updating the selected user using things that has been validated
        $booking->update($validated);

        return redirect()->route('booking.index')->with('success', 'Your Booking has been updated successfully!');
    }

    public function destroy($booking) {
        $booking = Booking::findOrFail($booking);

        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Your Booking has been deleted successfully!');
    }
}
