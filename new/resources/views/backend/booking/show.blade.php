@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Bookings /</span> Booking Details
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Booking Details -->
                        <h5 class="card-title">Booking Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ID:</strong> {{ $booking->id }}</li>
                            <li class="list-group-item"><strong>Vehicle:</strong> {{ $booking->vehicle->make }}</li>
                            <li class="list-group-item"><strong>User:</strong> {{ $booking->user->name }}</li>
                            <li class="list-group-item"><strong>Start Date:</strong> {{ $booking->start_date }}</li>
                            <li class="list-group-item"><strong>End Date:</strong> {{ $booking->end_date }}</li>
                            <li class="list-group-item"><strong>Pickup Location:</strong> {{ $booking->pickup_location }}</li>
                            <li class="list-group-item"><strong>Status:</strong> {{ $booking->booking_status }}</li>
                            <!-- Add more details as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
