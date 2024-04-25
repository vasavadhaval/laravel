@extends('backend.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Document Types /</span> Edit Document Type
            </h4>

            <div class="app-ecommerce">
                <!-- Edit Document Type Form -->
                <form method="POST" action="{{ route('admin.document_types.update', $documentType->id) }}">
                    @csrf
                    @method('PUT') <!-- Use PUT method for editing -->

                    <div class="row">
                        <!-- First column-->
                        <div class="col-12 col-lg-8">
                            <!-- Document Type Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Document Type Information</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Pre-fill the values of the input fields with the existing document type data -->
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $documentType->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4">{{ $documentType->description }}</textarea>
                                    </div>
                                    <!-- Add more details as needed -->
                                </div>
                            </div>
                            <!-- /Document Type Information -->
                        </div>
                        <!-- /First column -->

                        <!-- Second column -->
                        <div class="col-12 col-lg-4">
                            <!-- Additional Fields if needed -->
                        </div>
                        <!-- /Second column -->
                    </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('admin.document_types.index') }}" class="btn btn-label-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Document Type</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Buttons -->
                </form>
                <!-- /Edit Document Type Form -->
            </div>
        </div>
    </div>
@endsection
