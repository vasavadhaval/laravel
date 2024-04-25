@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">User Documents /</span> User Document Details
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- User Document Details -->
                        <h5 class="card-title">User Document Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Title:</strong> {{ $userDocument->title }}</li>
                            <li class="list-group-item"><strong>User:</strong> {{ $userDocument->user->name }}</li>
                            <li class="list-group-item"><strong>Document Type:</strong> {{ $userDocument->documentType->name }}</li>
                            <li class="list-group-item"><strong>Description:</strong> {{ $userDocument->description }}</li>
                            <!-- Add more details as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
