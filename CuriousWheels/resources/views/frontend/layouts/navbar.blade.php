        <!-- ***** Header Start ***** -->
        <header class="navbar navbar-sticky navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="index.html">
                    <span class="navbar-brand-regular dee">Curious Wheels <small>Exploring the Road Less Traveled</small></span>

                    <span class="navbar-brand-sticky dee">Curious Wheels <small>Exploring the Road Less Traveled</small></span>
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-inner">
                    <!--  Mobile Menu Toggler -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Vehicles
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <!-- Dropdown items for Vehicles -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('public.vehicles.index') }}">All Vehicles</a>
                                    </li>
                                    <!-- Dropdown items for Vehicle Types -->
                                    @php
                                        $vehicleTypes = App\Models\VehicleType::all();
                                    @endphp
                                    @foreach ($vehicleTypes as $type)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('public.vehicle_types.show', $type->id) }}">{{ $type->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link scroll" href="#contact">Contact</a>
                            </li>
                            <!-- Check if the user is logged in -->
                            @auth
                                <!-- Check the user's role to determine which dashboard link to display -->
                                @if(auth()->user()->hasRole('admin'))
                                    <!-- Show the "Admin Dashboard" link -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a>
                                    </li>
                                @elseif(auth()->user()->hasRole('user'))
                                    <!-- Show the "User Dashboard" link -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                                    </li>
                                @elseif(auth()->user()->hasRole('driver'))
                                    <!-- Show the "Driver Dashboard" link -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('driver.dashboard') }}">Dashboard</a>
                                    </li>
                                @endif
                            @else
                                <!-- If the user is not logged in, show the "Login" and "Sign Up" links -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- ***** Header End ***** -->
