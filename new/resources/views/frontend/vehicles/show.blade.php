@extends('frontend.layouts.app')

@section('content')

<style>
    .blog-area {
    background: #ffffff !important;
}
</style>
<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area bg-overlay d-flex align-items-center blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h3 class="text-white">{{ $vehicle->make }} {{ $vehicle->model }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('public.vehicles.index') }}">Vehicles</a></li>
                        <li class="breadcrumb-item active">{{ $vehicle->make }} {{ $vehicle->model }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blog" class="section blog-area ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <aside class="sidebar">
                    <!-- Single Widget -->

                    <!-- Single Widget -->

                    <!-- Single Widget -->
                    <div class="single-widget">
                        <!-- Category Widget -->
                        <div class="accordions widget catagory-widget" id="cat-accordion">
                            <div class="single-accordion blog-accordion">
                                <h5>
                                    <a role="button" class="collapse show text-uppercase d-block p-3" data-toggle="collapse" href="#accordion1">Categories
                                    </a>
                                </h5>
                                <!-- Category Widget Content -->
                                <div id="accordion1" class="accordion-content widget-content collapse show" data-parent="#cat-accordion">
                                    <!-- Category Widget Items -->
                                    <ul class="widget-items">
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{ route('public.vehicle_types.show', $category->id) }}" class="d-flex p-3 {{ $category->id == $vehicle->type ? 'active' : '' }}">
                                                    <span>{{ $category->name }}</span>
                                                    <span class="ml-auto">({{ $category->vehicles_count }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>



                                </div>
                            </div>
                        </div>
                    </div>


                </aside>
            </div>
            <div class="col-12 col-lg-9 card p-2">
                <!-- Single Blog Details -->
                <article class="single-blog-details">
                    <!-- Blog Thumb -->
                    <div class="blog-thumb">
                        <a href="#"><img src="{{ $vehicle->image_url }}" alt=""></a>
                    </div>
                    <!-- Blog Content -->
                    <div class="blog-content prolend-blog">
                        <!-- Meta Info -->
                        <div class="meta-info d-flex flex-wrap align-items-center py-2">
                            <ul>
                                <li class="d-inline-block p-2">By <a href="#">Dayane Mic</a></li>
                                <li class="d-inline-block p-2"><a href="#">05 Feb, 2018</a></li>
                                <li class="d-inline-block p-2"><a href="#">2 Comments</a></li>
                            </ul>
                            <!-- Blog Share -->
                            <div class="blog-share ml-auto d-none d-sm-block">
                                <!-- Social Icons -->
                                <div class="social-icons d-flex justify-content-center">
                                    <a class="bg-white facebook" href="#">
                                        <!-- Facebook Icon -->
                                    </a>
                                    <a class="bg-white twitter" href="#">
                                        <!-- Twitter Icon -->
                                    </a>
                                    <a class="bg-white google-plus" href="#">
                                        <!-- Google Plus Icon -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Details -->
                        <div class="blog-details">
                            <h3 class="blog-title my-3">{{ $vehicle->make }} {{ $vehicle->model }}</h3>
                            <!-- Badge labels for vehicle details -->
                            <div class="demo-inline-spacing">
                                <span class="badge rounded-pill bg-label-primary">Year: {{ $vehicle->year }}</span>
                                <span class="badge rounded-pill bg-label-secondary">Capacity: {{ $vehicle->capacity }}</span>
                                <span class="badge rounded-pill bg-label-success">Availability: {{ $vehicle->availability }}</span>
                                @if ($vehicle->vehiclelocation)
                                    <span class="badge bg-label-dark" style="white-space: normal; line-height: normal; text-align: left;">Location: {{ $vehicle->vehiclelocation->address }}</span>
                                @endif
                            </div>
                            <!-- Vehicle description -->
                            <p>{{ $vehicle->description }}</p>
                            <!-- Book now button -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('checkout.show', $vehicle) }}" class="blog-btn">Book now</a>
                                <span class="badge bg-label-danger">Price: ₹ {{ $vehicle->price }} / {{ $vehicle->rental_pricing_model }}</span>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->

@include('frontend.layouts.sitefooter')

@endsection
