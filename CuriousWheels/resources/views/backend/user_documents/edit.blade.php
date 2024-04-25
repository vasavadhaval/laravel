@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">User Documents /</span> Edit User Document
        </h4>


        <div class="app-ecommerce">
            <!-- Edit User Document Form -->
            <form method="POST" action="{{ route('admin.user_documents.update', $userDocument->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for editing -->

                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- User Document Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Document Information</h5>
                            </div>
                            <div class="card-body">
                                <!-- Make sure to pre-fill the values of the input fields with the existing user document data -->
                                <!-- For example: -->
                                <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $userDocument->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="user_id">User</label>
                                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                                        <!-- Populate with users -->
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == old('user_id', $userDocument->user_id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
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
                        <!-- /User Document Information -->
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

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Approval Status</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <select class="form-select @error('is_approved') is-invalid @enderror" id="is_approved" name="is_approved" required>
                                        <option value="0" {{ old('is_approved', $userDocument->is_approved) == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ old('is_approved', $userDocument->is_approved) == 1 ? 'selected' : '' }}>Approved</option>
                                        <option value="2" {{ old('is_approved', $userDocument->is_approved) == 2 ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    @error('is_approved')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /File -->
                    </div>

                    <!-- /Second column -->
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.user_documents.index') }}" class="btn btn-label-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update User Document</button>
                        </div>
                    </div>
                </div>
                <!-- /Buttons -->
            </form>

            <!-- /Edit User Document Form -->
        </div>
    </div>
</div>
@endsection
