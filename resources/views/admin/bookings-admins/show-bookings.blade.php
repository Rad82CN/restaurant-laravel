@extends('admin.layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">date</th>
                                <th scope="col">seats</th>
                                <th scope="col">request</th>
                                <th scope="col">remove</th>
                            </tr>
                        </thead>
                        @forelse($bookings as $booking)
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $booking->user_name }}</td>
                                    <td>{{ $booking->user_email }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->seats }}</td>
                                    <td>{{ $booking->request }}</td>
                                    <td>
                                        @if ($booking->status == 'pending')
                                            <form method="post" action="{{ route('adminBookings.update', $booking->id) }}">
                                                @csrf
                                                @method('put')
                                                <button class="btn btn-success btn-sm">Accept Booking</button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ route('adminBookings.destroy', $booking->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">Remove Booking</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <p class="text-center mt-3">No results has been found!</p>
                        @endforelse
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection