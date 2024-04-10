@extends('frontend.layouts.app')

@section('content')

<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area bg-overlay d-flex align-items-center blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h3 class="text-white">Vehicles</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Vehicles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->


        <!-- ***** Blog Area Start ***** -->
        <section id="blog" class="section blog-area ptb_100 blog">
            <div class="container">
                <div class="row">
                    @foreach($vehicles as $vehicle)
                    <div class="col-12 col-md-6">
                        <!-- Single Blog -->
                        <div class="single-blog res-margin">
                            <!-- Blog Thumb -->
                            <div class="blog-thumb">
                                <a href="{{ route('public.vehicles.show', $vehicle->id) }}"><img src="{{ $vehicle->image_url }}" alt=""></a>
                            </div>
                            <!-- Blog Content -->
                            <div class="blog-content p-4">
                                <h3 class="blog-title my-3"><a href="{{ route('public.vehicles.show', $vehicle->id) }}">{{ $vehicle->make }} {{ $vehicle->model }}</a></h3>
                                <!-- Badge labels for vehicle details -->
                                <div class="demo-inline-spacing">

                                    <span class="badge rounded-pill bg-label-secondary" style="    font-size: 16px;">{{ $vehicle->year }} Model</span>
                                    <span class="badge rounded-pill bg-label-secondary" style="font-size: 16px;">Type: {{ $vehicle->vehicleType->name }}</span>
                                    <span class="badge rounded-pill bg-label-secondary" style="font-size: 16px;">Capacity: {{ $vehicle->capacity }}</span></br>
                                    @if ($vehicle->vehiclelocation)
                                    <span class="badge bg-label-dark" style="
                                        margin: 13px 0px 13px !important;
                                        white-space: normal;
                                        font-size: 16px;
                                        line-height: normal;
                                        text-align: left;
                                        width: 100%;
                                    "><b>Location: </b></br> {{ $vehicle->vehiclelocation->address }}</span>
                                    @endif
                                </div>
                                <!-- Vehicle description -->
                                <p class="" style="    font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $vehicle->description }}</p>
                                <!-- Book now button -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('checkout.show', $vehicle) }}" class="blog-btn btn-primary mt-3  pr-5" style="padding: 12px; font-size: 20px;border-radius: 0.25rem;">Book Now</a>
                                    <span class="badge bg-label-danger mt-3" style="
                                    padding: 18px;
                                    font-size: 21px;
                                ">₹ {{ $vehicle->price }} / {{ $vehicle->rental_pricing_model }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ***** Blog Area End ***** -->
        @include('frontend.layouts.sitefooter')

@endsection
