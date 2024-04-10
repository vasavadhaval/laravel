@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Blogs /</span> Blog Details
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Blog Image -->
                        <img src="{{ $blog->image_url }}" class="img-fluid mb-3" alt="Blog Image">
                    </div>
                    <div class="col-md-8">
                        <!-- Blog Details -->
                        <h5 class="card-title">Blog Details</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Title:</strong> {{ $blog->title }}</li>
                            <li class="list-group-item"><strong>Content:</strong> {{ $blog->content }}</li>
                            <li class="list-group-item"><strong>Author:</strong> {{ $blog->author }}</li>
                            <!-- Add more details as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
