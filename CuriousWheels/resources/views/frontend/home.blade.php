@extends('frontend.layouts.app')

@section('content')
    <!--====== Preloader Area Start ======-->
    <div class="preloader-main">
        <div class="preloader-wapper">
            <svg class="preloader" xmlns="http://www.w3.org/2000/svg" version="1.1" width="600" height="200">
                <defs>
                    <filter id="goo" x="-40%" y="-40%" height="200%" width="400%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -8"
                            result="goo" />
                    </filter>
                </defs>
                <g filter="url(#goo)">
                    <circle class="dot" cx="50" cy="50" r="25" fill="#F74B54" />
                    <circle class="dot" cx="50" cy="50" r="25" fill="#F74B54" />
                </g>
            </svg>
            <div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    </div>

    <!--====== Scroll To Top Area Start ======-->
    <div id="scrollUp" title="Scroll To Top">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--====== Scroll To Top Area End ======-->
    <!-- ***** Welcome Area Start ***** -->
    <section id="home" class="section welcome-area bg-overlay h-100vh overflow-hidden">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <!-- Welcome Intro Start -->
                <div class="col-12 col-lg-7">
                    <div class="welcome-intro">
                        <h1 class="text-white"><span class="fw-3">Embark on Your Automotive Journey</span></h1>
                        <p class="text-white my-4">Dive into our diverse array of vehicles and uncover your next adventure.</p>
                        <!-- Store Buttons -->
                        <div class="button-group store-buttons d-flex">
                            <a href="#" class="btn prolend-primary style-three text-uppercase">Start Exploring</a>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-8 col-lg-5">
                    <!-- Contact Box -->
                    <div class="contact-box bg-white text-center rounded p-4 p-sm-5 mt-5 mt-lg-0 shadow-lg">
                        <!-- Contact Form -->
                        <form  action="{{ route('public.vehicles.search') }}" method="get">
                            @csrf
                            <div class="contact-top">
                                <h3 class="contact-title">Book Your Vehicle Now!</h3>
                                <h5 class="text-secondary fw-3 py-3">Please fill in all fields so we can assist you with your booking.</h5>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" name="pickup_location" required="required">
                                            <option value="">Select Pickup Location</option>
                                            @foreach ($vehicleLocations as $location)
                                                <option value="{{ $location->id }}">{{ $location->address }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="start_date" placeholder="dd-mm-yyyy" required="required" min="1997-01-01" max="2030-12-31">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="end_date" placeholder="End Date" required="required">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="vehicle_category" required="required">
                                            <option value="">Select Vehicle Category</option>
                                            @foreach ($vehicleTypes as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-bordered w-100 mt-3 mt-sm-4" type="submit">Book Now</button>
                                    <div class="contact-bottom">
                                        <span class="d-inline-block mt-3">By booking, you accept our <a href="#">Terms</a> &amp; <a href="#">Privacy Policy</a></span>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shape Bottom -->
        <div class="shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 170">
                <defs>
                    <linearGradient x1="49.253%" y1="85.804%" x2="49.253%" y2="43.074%" id="a">
                        <stop stop-color="#FFF" offset="0%" />
                        <stop stop-color="#FFF" offset="100%" />
                    </linearGradient>
                </defs>
                <g fill="none">
                    <path
                        d="M1920 4.719v69.5c-362.63 60.036-692.797 55.536-990.5-13.5C565.833-23.615 256 12.813 0 170L1 4.719h1919z"
                        fill="url(#a)" transform="rotate(180 960.5 87.36)" />
                    <path d="M1 170V99c269.033-70.44 603.533-66.44 1003.5 12C1494 207 1921 4.719 1921 4.719L1920 170H1z"
                        fill-opacity=".3" fill="#FFF" />
                    <path
                        d="M1 170.75V99C373.115 4.216 705.281-4.951 997.5 71.5c365.667 95.667 673.5 73.406 923.5-66.781l-1 166.031H1z"
                        fill-opacity=".3" fill="#FFF" />
                    <path
                        d="M1 170v-67C400.333-1.333 744.167-19 1032.5 50c432.5 103.5 754 19.219 888.5-45.281l-1 166.031L1 170z"
                        fill-opacity=".35" fill="#FFF" />
                </g>
            </svg>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Service Area Start ***** -->
    <section class="section service-area overflow-hidden ptb_100">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6">
                    <!-- Service Text -->
                    <div class="service-text pt-4 pt-lg-0">
                        <h2 class="promo-text mb-4">Discover the Features of Curious Wheels</h2>
                        <!-- Service List -->
                        <ul class="service-list">
                            <!-- Single Service -->
                            <li class="single-service media py-2">
                                <div class="feature-icon text-primary align-self-center pr-4">
                                    <span><i class="fas fa-check-circle fa-2x"></i></span>
                                </div>
                                <div class="service-text media-body">
                                    <p>Experience pure sound without added noise</p>
                                </div>
                            </li>
                            <!-- Single Service -->
                            <li class="single-service media py-2">
                                <div class="feature-icon text-primary align-self-center pr-4">
                                    <span><i class="fas fa-check-circle fa-2x"></i></span>
                                </div>
                                <div class="service-text media-body">
                                    <p>High-resolution audio compatibility</p>
                                </div>
                            </li>
                            <!-- Single Service -->
                            <li class="single-service media py-2">
                                <div class="feature-icon text-primary align-self-center pr-4">
                                    <span><i class="fas fa-check-circle fa-2x"></i></span>
                                </div>
                                <div class="service-text media-body">
                                    <p>High-quality wireless audio with BLUETOOTH® and LDAC technology</p>
                                </div>
                            </li>
                            <!-- Single Service -->
                            <li class="single-service media py-2">
                                <div class="feature-icon text-primary align-self-center pr-4">
                                    <span><i class="fas fa-check-circle fa-2x"></i></span>
                                </div>
                                <div class="service-text media-body">
                                    <p>Smart listening experience with Adaptive Sound Control</p>
                                </div>
                            </li>
                            <!-- Single Service -->
                            <li class="single-service media py-2">
                                <div class="feature-icon text-primary align-self-center pr-4">
                                    <span><i class="fas fa-check-circle fa-2x"></i></span>
                                </div>
                                <div class="service-text media-body">
                                    <p>Ergonomic and enfolding design earpads</p>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="btn prolend-btn mt-4">Learn More</a>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Service Thumb -->
                    <div class="service-thumb mx-auto text-center pt-4 pt-lg-0">
                        <img src="https://freepngimg.com/thumb/audi/20-audi-png-car-image.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Service Area End ***** -->
    <section id="products" class="products-area bg-gray ptb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2 class="text-capitalize">Browse Our Vehicles</h2>
                        <p class="d-none d-sm-block mt-4">Find the perfect vehicle for your needs from our wide selection of quality vehicles.</p>
                        <p class="d-block d-sm-none mt-4">Explore our wide selection of quality vehicles.</p>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="products owl-carousel">
                    @foreach($vehicles as $vehicle)
                    <!-- Product Card -->
                    <div class="card product-card text-center rounded">
                        <!-- Product Thumb -->
                        <img class="product-thumb- mx-auto pt-3" src="{{ $vehicle->image_url }}" alt="">
                        <!-- Card Body -->
                        <div class="card-body py-4">
                            <h3>{{ $vehicle->make }} {{ $vehicle->model }}</h3>
                            <h4 class="text-primary py-2">₹ {{ $vehicle->price }} / {{ $vehicle->rental_pricing_model }}</h4>
                            <!-- Product Features -->
                            <div class="product-features">
                                <span class="badge bg-label-primary">Year: {{ $vehicle->year }}</span>
                                <span class="badge bg-label-secondary">Capacity: {{ $vehicle->capacity }}</span>
                                @if ($vehicle->vehiclelocation)
                                <span class="badge bg-label-dark" style="white-space: normal;line-height: normal;">Location: {{ $vehicle->vehiclelocation->address }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- Product Order -->
                        <div class="product-order">
                            <!-- Order Button -->
                            <div class="order-btn d-flex flex-wrap justify-content-center">
                                <a class="btn prolend-primary style-two m-2" href="{{ route('public.vehicles.show', $vehicle->id) }}">View Details</a>
                                <a class="btn prolend-primary m-2" href="{{ route('checkout.show', $vehicle) }}">Book Now</a>

                            </div>
                        </div>
                    </div>
                    <!-- Product Card End -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Products Area End ***** -->


    <style>
        .cta-area {
    background: rgba(0, 0, 0, 0) url("https://images.pexels.com/photos/70912/pexels-photo-70912.jpeg") no-repeat scroll center center / cover;
}
    </style>
    <!-- ***** Vehicle Call To Action Area Start ***** -->
    <section class="section cta-area overlay-white overflow-hidden ptb_150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <!-- Vehicle Call To Action Text -->
                    <div class="vehicle-cta-text text-center pt-4 pt-lg-0">
                        <h2 class="mb-4">Find Your Perfect Vehicle</h2>
                        <p>Discover our latest collection of top-quality vehicles from various brands. Whether you're searching for a sedan, SUV, truck, or any other type of vehicle, we have something that fits your needs.</p>
                        <a href="{{ route('public.vehicles.index') }}" class="btn prolend-btn mt-4">Browse Vehicles</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Vehicle Call To Action Area End ***** -->
    <!-- ***** Review Area Start ***** -->
    <section class="review-area bg-gray ptb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2 class="text-capitalize">Customer Reviews</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-7">
                    <div class="reviews owl-carousel">
                        <!-- Single Review -->
                        <div class="single-review text-center">
                            <!-- Review Text -->
                            <p class="review-text">
                                <img class="avatar mr-2" src="{{ asset('frontend/assets/img/icon/quote2.png') }}" alt="">
                                "Excellent service! I rented a car for a weekend trip, and the process was smooth from start to finish. The vehicle was clean and well-maintained. Highly recommended!"
                            </p>
                            <!-- Reviewer -->
                            <div class="reviewer p-4">
                                <!-- Reviewer Thumb -->
                                <div class="reviewer-thumb">
                                    <img class="avatar-lg mx-auto radius-100" src="{{ asset('frontend/assets/img/avatar/avatar-1.png') }}" alt="">
                                </div>
                                <!-- Reviewer Media -->
                                <div class="reviewer-meta mt-3">
                                    <h5 class="reviewer-name mb-2">John Doe</h5>
                                    <h6 class="text-secondary fw-6">CEO, ABC Company</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Single Review -->
                        <div class="single-review text-center">
                            <!-- Review Text -->
                            <p class="review-text">
                                <img class="avatar mr-2" src="{{ asset('frontend/assets/img/icon/quote2.png') }}" alt="">
                                "I've used Curious Wheels multiple times for business trips, and they never disappoint. Their selection of vehicles is great, and their customer service is top-notch!"
                            </p>
                            <!-- Reviewer -->
                            <div class="reviewer p-4">
                                <!-- Reviewer Thumb -->
                                <div class="reviewer-thumb">
                                    <img class="avatar-lg mx-auto radius-100" src="{{ asset('frontend/assets/img/avatar/avatar-2.png') }}" alt="">
                                </div>
                                <!-- Reviewer Media -->
                                <div class="reviewer-meta mt-3">
                                    <h5 class="reviewer-name mb-2">Jane Smith</h5>
                                    <h6 class="text-secondary fw-6">CTO, XYZ Company</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Single Review -->
                        <div class="single-review text-center">
                            <!-- Review Text -->
                            <p class="review-text">
                                <img class="avatar mr-2" src="{{ asset('frontend/assets/img/icon/quote2.png') }}" alt="">
                                "The best car rental experience I've had! Their prices are competitive, and the staff is friendly and helpful. Will definitely rent from them again."
                            </p>
                            <!-- Reviewer -->
                            <div class="reviewer p-4">
                                <!-- Reviewer Thumb -->
                                <div class="reviewer-thumb">
                                    <img class="avatar-lg mx-auto radius-100" src="{{ asset('frontend/assets/img/avatar/avatar-3.png') }}" alt="">
                                </div>
                                <!-- Reviewer Media -->
                                <div class="reviewer-meta mt-3">
                                    <h5 class="reviewer-name mb-2">Michael Johnson</h5>
                                    <h6 class="text-secondary fw-6">Marketing Manager, ABC Company</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- ***** Review Area End ***** -->
    <!-- ***** FAQ Area Start ***** -->
    <section id="faq" class="section faq-area style-two bg-gray ptb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2 class="text-capitalize">Frequently asked questions</h2>
                        <p class="d-none d-sm-block mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                            obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.</p>
                        <p class="d-block d-sm-none mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum
                            obcaecati.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- FAQ Content -->
                    <div class="faq-content">
                        <!-- Prolend Accordion -->
                        <div class="accordion" id="prolend-accordion">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10">
                                    <!-- Single Card -->
                                    <div class="card border-0 bg-inherit">
                                        <!-- Card Header -->
                                        <div class="card-header bg-inherit border-0 p-0">
                                            <h2 class="mb-0">
                                                <button class="btn px-0 py-2" type="button">
                                                    1. Can I rent a vehicle online?
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body px-0 py-2">
                                            Yes, you can rent a vehicle online through our website. Simply browse through
                                            our available vehicles, select the one you want, and proceed with the rental
                                            process.
                                        </div>
                                    </div>
                                    <!-- Single Card -->
                                    <div class="card border-0 bg-inherit">
                                        <!-- Card Header -->
                                        <div class="card-header bg-inherit border-0 p-0">
                                            <h2 class="mb-0">
                                                <button class="btn px-0 py-2" type="button">
                                                    2. What types of vehicles do you offer for rental?
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body px-0 py-2">
                                            We offer a wide range of vehicles for rental, including cars, SUVs, vans,
                                            trucks, and more. You can choose the type of vehicle based on your specific
                                            needs and preferences.
                                        </div>
                                    </div>
                                    <!-- Single Card -->
                                    <div class="card border-0 bg-inherit">
                                        <!-- Card Header -->
                                        <div class="card-header bg-inherit border-0 p-0">
                                            <h2 class="mb-0">
                                                <button class="btn px-0 py-2" type="button">
                                                    3. How can I make a reservation?
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body px-0 py-2">
                                            Making a reservation is easy. Simply visit our website, select the vehicle you
                                            want to rent, choose your rental dates and times, and proceed with the
                                            reservation process. You can also contact us directly for assistance with making
                                            a reservation.
                                        </div>
                                    </div>
                                    <!-- Single Card -->
                                    <div class="card border-0 bg-inherit">
                                        <!-- Card Header -->
                                        <div class="card-header bg-inherit border-0 p-0">
                                            <h2 class="mb-0">
                                                <button class="btn px-0 py-2" type="button">
                                                    4. What are your rental rates?
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body px-0 py-2">
                                            Our rental rates vary depending on the type of vehicle, rental duration, and
                                            other factors. You can view our current rental rates on our website or contact
                                            us directly for a personalized quote.
                                        </div>
                                    </div>
                                    <!-- Single Card -->
                                    <div class="card border-0 bg-inherit">
                                        <!-- Card Header -->
                                        <div class="card-header bg-inherit border-0 p-0">
                                            <h2 class="mb-0">
                                                <button class="btn px-0 py-2" type="button">
                                                    5. Do you offer insurance for rented vehicles?
                                                </button>
                                            </h2>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body px-0 py-2">
                                            Yes, we offer insurance options for rented vehicles to provide you with peace of
                                            mind during your rental period. You can choose from various insurance coverage
                                            options based on your needs.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <p class="text-body text-center pt-4 fw-5">Haven't found a suitable answer? <a
                                        href="#">Ask here.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** FAQ Area End ***** -->
    <!--====== Contact Area Start ======-->
    <section id="contact" class="contact-area ptb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2 class="text-capitalize">Vehicle Rental Contact</h2>
                        <p class="d-none d-sm-block mt-4">Contact us for any inquiries about our vehicle rental services.
                        </p>
                        <p class="d-block d-sm-none mt-4">Contact us for any inquiries about our vehicle rental services.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <!-- Contact Box -->
                    <div class="contact-box text-center">
                        <!-- Contact Form -->
                        <form id="contact-form" method="POST" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Message" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn mt-3"><span class="text-white pr-3"><i
                                                class="fas fa-paper-plane"></i></span>Send Message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Area End ======-->

    <!--====== Footer Area Start ======-->
    <footer class="footer-area dark-bg">
        <!-- Footer Top -->
        <div class="footer-top ptb_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Logo -->
                            <a class="navbar-brand" href="#">
                                <img class="logo" src="{{ asset('frontend/assets/img/logo/logo-white.png') }}"
                                    alt="">
                            </a>
                            <p class="mt-2 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit laboriosam vitae.
                            </p>
                            <!-- Social Icons -->
                            <div class="social-icons d-flex">
                                <a class="facebook" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="twitter" href="#">
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="google-plus" href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                                <a class="vine" href="#">
                                    <i class="fab fa-vine"></i>
                                    <i class="fab fa-vine"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Footer Title -->
                            <h3 class="footer-title mb-2">Company</h3>
                            <ul>
                                <li class="py-2"><a href="#">About Us</a></li>
                                <li class="py-2"><a href="#">Our Services</a></li>
                                <li class="py-2"><a href="#">Career</a></li>
                                <li class="py-2"><a href="#">Read our Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Footer Title -->
                            <h3 class="footer-title mb-2">Support</h3>
                            <ul>
                                <li class="py-2"><a href="#">Legal Information</a></li>
                                <li class="py-2"><a href="#">Privacy Policy</a></li>
                                <li class="py-2"><a href="#">Terms &amp; Conditions</a></li>
                                <li class="py-2"><a href="#">Report Abuse</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <!-- Footer Items -->
                        <div class="footer-items">
                            <!-- Footer Title -->
                            <h3 class="footer-title mb-2">Get In touch</h3>
                            <ul>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <span class="media-body align-self-center">27 Lakeshore Court, Mooresville, NC
                                            28115</span>
                                    </a>
                                </li>
                                <li class="py-2">
                                    <a class="media" href="#">
                                        <div class="social-icon mr-3">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <span class="media-body align-self-center">+1 230 456 789-012 6789</span>
                                    </a>
                                </li>
                                <!-- Subscribe Form -->
                                <div class="subscribe-form d-flex align-items-center mt-3">
                                    <input type="email" class="form-control" placeholder="Enter Email">
                                    <button type="submit" class="btn btn-yellow"><i
                                            class="fas fa-location-arrow"></i></button>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Copyright Area -->
                        <div
                            class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                            <!-- Copyright Left -->
                            <div class="copyright-left">&copy; Copyrights 2020 Prolend All rights reserved.</div>
                            <!-- Copyright Right -->
                            <div class="copyright-right">Made with <i class="fas fa-heart"></i> By <a
                                    href="#">Theme Land</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--====== Footer Area End ======-->
@endsection
