@extends('backend.layouts.main')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Profile
        </h4>

        <div class="row fv-plugins-icon-container">
            <div class="col-md-12">
                <!-- Profile Information Section -->
                <div class="card mb-4">
                    <h5 class="card-header">Profile Information</h5>
                    <div class="card-body">
                            <!-- Profile Information Form -->
                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')

                                <!-- Name Field -->
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Save Button -->
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </div>
                            </form>

                    </div>
                </div>

                <!-- Update Password Section -->
                <div class="card mb-4">
                    <h5 class="card-header">Update Password</h5>
                    <div class="card-body">
                        <!-- Update Password Form -->
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <!-- Current Password Field -->
                            <div class="mb-3">
                                <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                                <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <!-- New Password Field -->
                            <div class="mb-3">
                                <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                                <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="mb-3">
                                <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Save Button -->
                            <div class="d-flex align-items-center gap-4">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>

                    </div>
                </div>

                <!-- Delete Account Section -->
                <div class="card mb-4">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <!-- Delete Account Form -->
                        <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('delete')

                            <!-- Password Field -->
                            <div>
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" id="password" name="password">
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                            </div>

                            <!-- Confirm Deletion Checkbox -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="confirm_deletion" id="confirm_deletion">
                                <label class="form-check-label" for="confirm_deletion">I confirm my account deletion</label>
                            </div>

                            <!-- Delete Button -->
                            <div class="mt-2">
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content wrapper -->
@endsection
