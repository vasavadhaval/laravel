@extends('backend.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">My Documents /</span> Edit Document
            </h4>


            <div class="app-ecommerce">
                <!-- Edit Document Form -->
                <form method="POST" action="{{ route('user.documents.update', $userDocument->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for editing -->

                    <div class="row">
                        <!-- First column-->
                        <div class="col-12 col-lg-8">
                            <!-- Document Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Document Information</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Make sure to pre-fill the values of the input fields with the existing document data -->
                                    <!-- For example: -->
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $userDocument->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="document_type_id">Document Type</label>
                                        <select class="form-select @error('document_type_id') is-invalid @enderror" id="document_type_id" name="document_type_id" required>
                                            <!-- Populate with document types -->
                                            @foreach ($documentTypes as $documentType)
                                                <option value="{{ $documentType->id }}" {{ $documentType->id == old('document_type_id', $userDocument->document_type_id) ? 'selected' : '' }}>{{ $documentType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('document_type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $userDocument->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Add more details as needed -->
                                </div>
                            </div>
                            <!-- /Document Information -->
                        </div>
                        <!-- /First column -->

                        <!-- Second column -->
                        <div class="col-12 col-lg-4">
                            <!-- File -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">File</h5>
                                </div>
                                <div class="card-body">
                                    <!-- PDF Block -->
                                    <a href="{{ $userDocument->file_path }}" target="_blank" class="btn btn-primary w-100 mb-2">
                                        <i class="menu-icon tf-icons bx bx-file"></i>
                                        {{ $userDocument->title }}
                                    </a>
                                    <div class="mb-3">
                                        <label class="form-label" for="file_path">Update File</label>
                                        <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" accept="application/pdf">
                                        @error('file_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- /Second column -->
                    </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('user.documents.index') }}" class="btn btn-label-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Document</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Buttons -->
                </form>

                <!-- /Edit Document Form -->
            </div>
        </div>
    </div>
@endsection
