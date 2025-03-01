<div class="container-xxl p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurant</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('index') }}" class="{{ (Route::is('index')) ? 'active' : '' }} nav-item nav-link">Home</a>
                <a href="{{ route('booking.create') }}" class="{{ (Route::is('booking.create')) ? 'active' : '' }} nav-item nav-link">Book a Table</a>
                <a href="{{ route('foods.index') }}" class="{{ (Route::is('foods.index')) ? 'active' : '' }} nav-item nav-link">Menu</a>
                @auth()
                    <a href="{{ route('cart.index') }}" class="{{ (Route::is('cart.index')) ? 'active' : '' }} nav-item nav-link"><i class="fa-sharp fa-solid fa-cart-shopping"></i>Cart</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('booking.index') }}">Bookings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm mx-2" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest()
                    <a href="{{ route('login') }}" class="{{ (Route::is('login')) ? 'active' : '' }} nav-item nav-link">Login</a>
                    <a href="{{ route('register') }}" class="{{ (Route::is('register')) ? 'active' : '' }} nav-item nav-link">Register</a>
                @endguest
                
            </div>
        </div>
    </nav>
</div>