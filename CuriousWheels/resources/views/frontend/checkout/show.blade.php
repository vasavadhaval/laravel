@extends('frontend.layouts.app')

@section('content')

<!-- ***** Breadcrumb Area Start ***** -->
<section class="section breadcrumb-area bg-overlay d-flex align-items-center blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Breadcrumb Content -->
                <div class="breadcrumb-content d-flex flex-column align-items-center text-center">
                    <h3 class="text-white">Book a Vehicle</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Book a Vehicle</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blog" class="section blog-area pt-5 pb-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card shadow">
                    <img src="{{ $vehicle->image_url }}" class="card-img-top rounded" alt="Vehicle Image">
                    <div class="card-body">
                        <h5 class="card-title">Vehicle Information</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Make</th>
                                        <td>{{ $vehicle->make }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Model</th>
                                        <td>{{ $vehicle->model }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Year</th>
                                        <td>{{ $vehicle->year }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Type</th>
                                        <td>{{ $vehicle->type }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Capacity</th>
                                        <td>{{ $vehicle->capacity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $vehicle->description }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Location</th>
                                        <td>{{ $vehicle->vehiclelocation->address }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fuel Type</th>
                                        <td>{{ $vehicle->fuel_type }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Transmission</th>
                                        <td>{{ $vehicle->transmission }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mileage</th>
                                        <td>{{ $vehicle->mileage }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td>₹ {{ $vehicle->price }} / {{ $vehicle->rental_pricing_model }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " style="    max-width: 341px;" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Date and Time Range Selector</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="flatpickr-datetime-range"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" id="clearBtn">Clear</button>
                      <button type="button" class="btn btn-primary" id="applyBtn">Apply</button>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Form Section -->
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Reservation</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="booking-form" method="POST" action="{{ route('create.order') }}">
                            @csrf
                            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                            <input type="hidden" name="payment_id" id="payment_id" >
                            <input type="hidden" name="total_cost" id="total_cost" value=" {{ $vehicle->price }}">
                            <input type="hidden" name="pickup_location" id="custom_pickup_location" value=" {{ $vehicle->vehiclelocation->address }}">
                            @php
                            use App\Models\VehicleLocation;
                            $vehicleLocations = VehicleLocation::all(); // Retrieve all vehicle locations from the database
                        @endphp
                        <div class="mb-3">
                            <label for="pickup_location" class="form-label">Pickup Location</label>
                            <select id="pickup_location" name="pickup_location" class="form-select form-control" disabled>
                                <option value="">Select Pickup Location</option>
                                @foreach($vehicleLocations as $location)
                                    <option value="{{ $location->address }}" {{ $vehicle->vehiclelocation->id == $location->id ? 'selected' : '' }}>{{ $location->address }}</option>
                                @endforeach
                            </select>
                            <!-- Checkbox for custom location -->
                            <div class="form-check mt-2">
                                <input class="form-check-input" name="is_custom_location" value="1" type="checkbox" id="custom_location_checkbox">
                                <label class="form-check-label" for="custom_location_checkbox">Enter Custom Location</label>
                            </div>
                            <!-- Danger message span for pickup location -->
                            <span id="pickup-location-error" class="text-danger d-none">Please select or enter a pickup location.</span>
                        </div>

                        <!-- Hidden input field for custom location -->
                        <input type="text" id="custom_pickup_location" name="custom_pickup_location" class="form-control d-none">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="text" id="start_date" name="start_date" class="form-control" placeholder="Start Date" required>
                                    <!-- Danger message span for start date -->
                                    <span id="start-date-error" class="text-danger d-none">Please enter a start date.</span>
                                </div>
                                <div class="col-12">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="text" id="end_date" name="end_date" class="form-control" placeholder="End Date" required>
                                    <!-- Danger message span for end date -->
                                    <span id="end-date-error" class="text-danger d-none">Please enter an end date.</span>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="button" class="btn btn-primary btn-lg" id="rzp-button">Proceed to Payment</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@include('frontend.layouts.sitefooter')

@endsection



