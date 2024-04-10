@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Blogs /</span> Edit Blog
        </h4>

        <div class="app-ecommerce">
            <!-- Edit Blog Form -->
            <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for editing -->

                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- Blog Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Blog Information</h5>
                            </div>
                            <div class="card-body">
                                <!-- Make sure to pre-fill the values of the input fields with the existing blog data -->
                                <!-- For example: -->
                                <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="content">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="6" required>{{ $blog->content }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" value="{{ $blog->author }}" required>
                                </div>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                        <!-- /Blog Information -->
                    </div>
                    <!-- /First column -->

                    <!-- Second column -->
                    <div class="col-12 col-lg-4">
                        <!-- Image -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Image</h5>
                            </div>
                            <div class="card-body">
                                <img src="{{ $blog->image_url }}" class="img-fluid mb-3" alt="Blog Image">
                                <div class="mb-3">
                                    <label class="form-label" for="image">Update Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>
                    <!-- /Second column -->
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-label-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                        </div>
                    </div>
                </div>
                <!-- /Buttons -->
            </form>
            <!-- /Edit Blog Form -->
        </div>
    </div>
</div>
@endsection
