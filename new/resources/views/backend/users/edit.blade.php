@extends('backend.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Users /</span> Edit User
        </h4>

        <div class="app-ecommerce">
            <!-- Edit User Form -->
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for editing -->

                <div class="row">
                    <!-- First column-->
                    <div class="col-12 col-lg-8">
                        <!-- User Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">User Information</h5>
                            </div>
                            <div class="card-body">
                                <!-- Make sure to pre-fill the values of the input fields with the existing user data -->
                                <!-- For example: -->
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="role">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}" required>
                                </div>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                        <!-- /User Information -->
                    </div>
                    <!-- /First column -->

                    <!-- Second column -->
                    <div class="col-12 col-lg-4">
                        <!-- Avatar -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Avatar</h5>
                            </div>
                            <div class="card-body">
                                <img src="{{ $user->avatar_url }}" class="img-fluid mb-3" alt="User Avatar">
                                <div class="mb-3">
                                    <label class="form-label" for="avatar">Update Avatar</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>
                            </div>
                        </div>
                        <!-- /Avatar -->
                    </div>
                    <!-- /Second column -->
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-label-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                </div>
                <!-- /Buttons -->
            </form>
            <!-- /Edit User Form -->
        </div>
    </div>
</div>
@endsection
