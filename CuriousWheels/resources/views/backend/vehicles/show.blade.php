@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Vehicles /</span> Vehicle Details
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Vehicle Image -->
                        <img src="{{ $vehicle->image_url }}" class="img-fluid mb-3" alt="Vehicle Image">
                    </div>
                    <div class="col-md-8">
                        <!-- Vehicle Details -->
                        <h5 class="card-title">Vehicle Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Title:</strong> {{ $vehicle->make }}</li>
                            <li class="list-group-item"><strong>Model:</strong> {{ $vehicle->model }}</li>
                            <li class="list-group-item"><strong>Year:</strong> {{ $vehicle->year }}</li>
                            <li class="list-group-item"><strong>Type:</strong> {{ $vehicle->type }}</li>
                            <!-- Add more details as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
