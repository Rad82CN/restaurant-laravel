@extends('layouts.layout')

@section('content')

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active">View Food</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ $food->getImageURL() }}">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4">{{ $food->name }}</h1>
                        <p class="mb-4">{{ $food->description }}</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Price: $ {{ $food->price }}</h3>                                   
                                </div>
                            </div>
                           
                        </div>
                        <form action="{{ route('cart.add', $food->id) }}" method="post">
                            @csrf
                            <button class="btn btn-primary py-3 px-5 mt-2" name="submit" type="submit" href="{{ route('cart.add', $food->id) }}">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection