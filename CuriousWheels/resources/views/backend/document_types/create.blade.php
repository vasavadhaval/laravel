@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Document Types /</span><span> Add Document Type</span>
            </h4>

            <div class="app-ecommerce">
                <!-- Add Document Type Form -->
                <form method="POST" action="{{ route('admin.document_types.store') }}">
                    @csrf

                    <div class="row">
                        <!-- First column-->
                        <div class="col-12 col-lg-8">
                            <!-- Document Type Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Document Type Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Document Type Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Document Type Description"></textarea>
                                    </div>
                                    <!-- Add more fields as needed -->
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
                                <button type="submit" class="btn btn-primary">Add Document Type</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Buttons -->
                </form>
                <!-- /Add Document Type Form -->
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
