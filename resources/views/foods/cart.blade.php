@extends('layouts.layout')

@section('content')

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
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
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($foods as $food)
                                <tr>
                                    <td><img src="{{ $food->getImageURL() }}" alt="image" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $food->name }}</td>
                                    <td>${{ $food->price }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $food->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger text-white" type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-center mt-3">Nothing has been added to your cart!</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                        <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: ${{ $foods_price }}</p>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        
@endsection


