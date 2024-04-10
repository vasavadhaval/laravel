@extends('frontend.layouts.app')

@section('content')

<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area bg-overlay d-flex align-items-center blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h3 class="text-white">{{ $vehicleType->name }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('public.vehicles.index') }}">Vehicles</a></li>
                        <li class="breadcrumb-item active">{{ $vehicleType->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Breadcrumb Area End ***** -->
@if ($vehicles->isEmpty())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger my-5">
                <div class="card-body text-center">
                    <h5 class="card-title text-danger">No data available for {{ $vehicleType->name }}</h5>
                    <p class="card-text">Please check back later or try a different category.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@else

    <!-- ***** Blog Area Start ***** -->
    <section id="blog" class="section blog-area ptb_100 blog">
        <div class="container">
            <div class="row">
                @foreach($vehicles as $vehicle)
                <div class="col-12 col-md-4">
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
                                <span class="badge rounded-pill bg-label-primary">Year: {{ $vehicle->year }}</span>
                                <span class="badge rounded-pill bg-label-secondary">Capacity: {{ $vehicle->capacity }}</span>
                                <span class="badge rounded-pill bg-label-success">Availability: {{ $vehicle->availability }}</span>
                                @if ($vehicle->vehiclelocation)
                                <span class="badge bg-label-dark" style="
                                    white-space: normal;
                                    line-height: normal;
                                    text-align: left;
                                ">Location: {{ $vehicle->vehiclelocation->address }}</span>
                                @endif
                            </div>
                            <!-- Vehicle description -->
                            <p>{{ $vehicle->description }}</p>
                            <!-- Book now button -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('public.vehicles.show', $vehicle->id) }}" class="blog-btn mt-3">Book now</a>
                                <span class="badge bg-label-danger mt-3">Price: ₹ {{ $vehicle->price }} / {{ $vehicle->rental_pricing_model }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->
@endif
@include('frontend.layouts.sitefooter')

@endsection
