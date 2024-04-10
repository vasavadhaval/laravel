@extends('backend.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Vehicle Locations /</span><span> Add Vehicle Location</span>
        </h4>

        <div class="app-ecommerce">
            <!-- Add Vehicle Location Form -->
            <form method="POST" action="{{ route('admin.vehicle_locations.store') }}">
                @csrf

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Vehicle Location Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Vehicle Location Address" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.vehicle_locations.index') }}" class="btn btn-label-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Vehicle Location</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /Add Vehicle Location Form -->
        </div>

    </div>
</div>
@endsection
