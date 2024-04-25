@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="py-3 mb-0">
                    <span class="text-muted fw-light">Vehicles /</span> All Vehicles <!-- Change the title here -->
                </h4>
                <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
            </div>

            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Type</th>
                                <th>Price Per Hour</th>
                                <th>Price Per Day</th>
                                <th>Fuel Type</th>
                                <th>Transmission</th>
                                <th>Mileage</th>
                                <th>Plate Number</th>
                                <th>Actions</th> <!-- Added Actions column -->
                                {{-- <th>Insurance Number</th> --}}
                                <!-- Add more table headers for other attributes -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>{{ $vehicle->make }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ $vehicle->vehicleType->name }}</td>
                                    <td>₹ {{ $vehicle->price }}/  Per Hour</td>
                                    <td>₹ {{ $vehicle->price_perday }}/  Per Day</td>
                                    <td>{{ $vehicle->fuel_type }}</td>
                                    <td>{{ $vehicle->transmission }}</td>
                                    <td>{{ $vehicle->mileage }}</td>
                                    <td>{{ $vehicle->plate_number }}</td>
                                    {{-- <td>{{ $vehicle->insurance_number }}</td> --}}
                                    <td>

                                        <a href="{{ route('admin.vehicles.show', $vehicle->id) }}" class="item-show"><i class='bx bx-show'></i></a>
                                        <a href="{{ route('admin.vehicles.edit', ['id' => $vehicle->id]) }}" class="item-edit"><i class="bx bxs-edit"></i></a>
                                        <a href="javascript:;" class="item-delete text-danger" data-id="{{ $vehicle->id }}"><i class='bx bx-trash-alt'></i></a>
                                    </td>
                                    <!-- Add more table cells for other attributes -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <!-- Footer content -->
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Your scripts -->
    <script>
        $(document).ready(function() {
            $('.item-delete').on('click', function() {

                var _this = $(this);
                var vehicleId = $(this).data('id');
                if (confirm('Are you sure you want to delete this vehicle?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("admin.vehicles.destroy", ":id") }}'.replace(':id', vehicleId),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            _this.closest('tr').remove();

                            // Optionally, you can reload the page or update the table
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred while deleting the vehicle: ' + error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
