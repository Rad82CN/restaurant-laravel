@extends('layouts.layout')

@section('content')

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Bookings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active">Bookings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                <th scope="col">Seats</th>
                                <th scope="col">Request</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->user_name }}</td>
                                    <td>{{ $booking->user_email }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->seats }}</td>
                                    <td>{{ $booking->request }}</td>
                                    <td>{{ $booking->status }}</td>
                                    <td>
                                        @if ($booking->status == 'pending')
                                            <form action="{{ route('booking.edit', $booking->id) }}">
                                                <button class="btn btn-info text-white" type="submit">Edit</button>
                                            </form>
                                        @else
                                            <p class="text-center mt-3">You cant edit anymore!</p>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger text-white" type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-center mt-3">Nothing has been added to your cart!</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- Service End -->
        
@endsection


