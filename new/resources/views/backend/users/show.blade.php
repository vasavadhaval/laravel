@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Users /</span> User Details
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- User Avatar -->
                        <img src="{{ $user->avatar_url }}" class="img-fluid mb-3" alt="User Avatar">
                    </div>
                    <div class="col-md-8">
                        <!-- User Details -->
                        <h5 class="card-title">User Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                            <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
                            <!-- Add more details as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
