@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">My Documents /</span><span> Add Document</span>
            </h4>

            <div class="app-ecommerce">
                <!-- Add Document Form -->
                <form method="POST" action="{{ route('user.documents.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- First column-->
                        <div class="col-12 col-lg-8">
                            <!-- Document Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Document Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Document Title" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="document_type_id">Document Type</label>
                                        <select class="form-select @error('document_type_id') is-invalid @enderror" id="document_type_id" name="document_type_id" required>
                                            <option value="" selected disabled>Select Document Type</option>
                                            <!-- Populate with document types -->
                                            @foreach ($documentTypes as $documentType)
                                                <option value="{{ $documentType->id }}">{{ $documentType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('document_type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="file_path">File</label>
                                        <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" accept="application/pdf" required>
                                        @error('file_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Document Description"></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Add more fields as needed -->
                                </div>
                            </div>
                            <!-- /Document Information -->
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
                                <a href="{{ route('user.documents.index') }}" class="btn btn-label-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Document</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Buttons -->
                </form>
                <!-- /Add Document Form -->
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    © <script>document.write(new Date().getFullYear())</script>, made with ❤️ by <a href="http://127.0.0.1:8000/" target="_blank" class="footer-link fw-medium">Curious Wheels</a>
                </div>
                <div class="d-none d-lg-inline-block">
                    <a href="http://127.0.0.1:8000//license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="http://127.0.0.1:8000//" target="_blank" class="footer-link me-4">More Themes</a>
                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>
                    <a href="http://127.0.0.1:8000//support/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
