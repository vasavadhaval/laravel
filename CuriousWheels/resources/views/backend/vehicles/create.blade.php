@extends('backend.layouts.main')
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/quill/typography.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/quill/katex.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/quill/editor.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/dropzone/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/tagify/tagify.css') }}">
        <!-- Page CSS -->
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Vehicles /</span><span> Add Vehicle</span>
        </h4>

        <div class="app-ecommerce">
            <!-- Add Vehicle Form -->
            <form method="POST" action="{{ route('admin.vehicles.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- Vehicle Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Vehicle Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="make">Make</label>
                                    <input type="text" class="form-control" id="make" name="make" placeholder="Vehicle Make" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="model">Model</label>
                                    <input type="text" class="form-control" id="model" name="model" placeholder="Vehicle Model" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" placeholder="Vehicle Year" required>
                                </div>
                                <div class="form-group">
                                    <label for="type">Vehicle Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="">Select Vehicle Type</option>
                                        @foreach ($vehicleTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="capacity">Capacity</label>
                                    <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Vehicle Capacity" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="availability">Availability</label>
                                    <select class="form-select" id="availability" name="availability" required>
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Vehicle Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select class="form-control" id="location" name="location">
                                        <option value="">Select Vehicle Location</option>
                                        @foreach ($vehicleLocations as $location)
                                            <option value="{{ $location->id }}">{{ $location->address }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="fuel_type">Fuel Type</label>
                                    <input type="text" class="form-control" id="fuel_type" name="fuel_type" placeholder="Fuel Type">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="transmission">Transmission</label>
                                    <input type="text" class="form-control" id="transmission" name="transmission" placeholder="Transmission Type">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="mileage">Mileage</label>
                                    <input type="number" class="form-control" id="mileage" name="mileage" placeholder="Mileage">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="plate_number">Plate Number</label>
                                    <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="Plate Number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="insurance_number">Insurance Number</label>
                                    <input type="text" class="form-control" id="insurance_number" name="insurance_number" placeholder="Insurance Number">
                                </div>
                                <!-- Add more fields as needed -->
                            </div>
                        </div>
                        <!-- /Vehicle Information -->
                    </div>
                    <!-- /First column -->

                    <!-- Second column -->
                    <div class="col-12 col-lg-4">
                        <!-- Pricing Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Pricing</h5>
                            </div>
                            <div class="card-body">
                                <!-- Price -->
                                <div class="mb-3">
                                    <label class="form-label" for="price">Price Per Hour</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Vehicle Per Hour Price" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="price">Price Per Day</label>
                                    <input type="number" class="form-control" id="price_perday" name="price_perday" placeholder="Vehicle Per Day Price" required>
                                </div>
                                <div class="mb-3 d-none">
                                    <select class="form-control" name ="rental_pricing_model" id="pricingModelSelect">
                                        <option value="Per Hour">Per Hour</option>
                                        <option value="Per Day">Per Day</option>
                                    </select>
                                </div>


                                <!-- Add more pricing-related fields if needed -->
                            </div>
                        </div>
                        <!-- /Pricing Card -->

                        <!-- Pricing Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Image</h5>
                            </div>
                            <div class="card-body">
                                <!-- Price -->
                                <div class="mb-3">
                                    <label class="form-label" for="image_url">Image URL</label>
                                    <input type="file" class="form-control" id="image_url" name="image_url"  accept="image/*" placeholder="Image URL">
                                </div>
                                <!-- Add more pricing-related fields if needed -->
                            </div>
                        </div>
                        <!-- /Pricing Card -->
                    </div>
                    <!-- /Second column -->
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-label-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Vehicle</button>
                        </div>
                    </div>
                </div>
                <!-- /Buttons -->
            </form>
            <!-- /Add Vehicle Form -->
        </div>
    </div>
    <!-- / Content -->




        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with ❤️ by <a href="http://127.0.0.1:8000/" target="_blank"
                        class="footer-link fw-medium">Curious Wheels</a>
                </div>
                <div class="d-none d-lg-inline-block">

                    <a href="http://127.0.0.1:8000//license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="http://127.0.0.1:8000//" target="_blank" class="footer-link me-4">More Themes</a>

                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="footer-link me-4">Documentation</a>


                    <a href="http://127.0.0.1:8000//support/" target="_blank"
                        class="footer-link d-none d-sm-inline-block">Support</a>

                </div>
            </div>
        </footer>
        <!-- / Footer -->


        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
<script src="{{ asset('backend/assets/vendor/libs/quill/katex.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/quill/quill.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/libs/tagify/tagify.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('backend/assets/js/app-ecommerce-product-add.js') }}"></script>
