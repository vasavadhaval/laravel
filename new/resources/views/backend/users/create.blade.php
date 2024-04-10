@extends('backend.layouts.main')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Users /</span><span> Add User</span>
        </h4>

        <div class="app-ecommerce">
            <!-- Add User Form -->
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- User Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="User Email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">Avatar</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                </div>
                                <!-- Add more fields as needed -->
                            </div>
                        </div>
                        <!-- /User Information -->
                    </div>
                    <!-- /First column -->

                    <!-- Second column -->
                    <div class="col-12 col-lg-4">
                        <!-- User Role Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Role</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="role">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <!-- Add more role-related fields if needed -->
                            </div>
                        </div>
                        <!-- /User Role Card -->
                    </div>
                    <!-- /Second column -->
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-label-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </div>
                </div>
                <!-- /Buttons -->
            </form>

            <!-- /Add User Form -->
        </div>

    </div>
    <!-- / Content -->
    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with ❤️ by <a href="http://127.0.0.1:8000/" target="_blank"
                    class="footer-link fw-medium">Curious Wheels</a>
            </div>
            <div class="d-none d-lg-inline-block">
                <a href="http://127.0.0.1:8000//license/" class="footer-link me-4" target="_blank">License</a>
                <a href="http://127.0.0.1:8000//" target="_blank" class="footer-link me-4">More Themes</a>
                <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank" class="footer-link me-4">Documentation</a>
                <a href="http://127.0.0.1:8000//support/" target="_blank"
                    class="footer-link d-none d-sm-inline-block">Support</a>
            </div>
        </div>
    </footer>
    <!-- / Footer -->
    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@endsection

