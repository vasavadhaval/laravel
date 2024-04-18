@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Total Vehicles Count</h5>
                                    <p class="mb-4">Total vehicles in the system: <span class="fw-medium">{{ $totalVehicles }}</span></p>

                                    <!-- Link to view all vehicles -->
                                    <a href="{{ route('admin.vehicles.index') }}" class="btn btn-sm btn-label-primary">View Vehicles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Total Users Count</h5>
                                    <p class="mb-4">Total users in the system: <span class="fw-medium">{{ $totalUsers }}</span></p>

                                    <!-- Link to view all users -->
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-label-primary">View Users</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Today's Bookings Count</h5>
                                    <p class="mb-4">Total bookings today: <span class="fw-medium">{{ $todayBookingsCount }}</span></p>

                                    <!-- Link to view today's bookings -->
                                    <a href="{{ route('admin.bookings.today') }}" class="btn btn-sm btn-label-primary">View Today's Bookings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
