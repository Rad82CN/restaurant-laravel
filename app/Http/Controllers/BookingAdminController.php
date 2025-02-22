<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index() {
        $bookings = Booking::all();
        
        return view('admin.bookings-admins.show-bookings', compact('bookings'));
    }

    public function update($booking) {
        $booking = Booking::findOrFail($booking);

        // changing status of reservation to accepted
        $booking['status'] = 'accepted';
        $booking->update();

        return redirect()->route('adminBookings.index')->with('success', 'The booking has been accepted successfully!');
    }

    public function destroy($booking) {
        $booking = Booking::findOrFail($booking);

        $booking->delete();

        return redirect()->route('adminBookings.index')->with('success', 'The booking has been deleted successfully!');
    }
}
