@extends('backend.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="py-3 mb-0">
                <span class="text-muted fw-light">Vehicle Locations /</span><span> All Vehicle Locations</span>
            </h4>
            <a href="{{ route('admin.vehicle_locations.create') }}" class="btn btn-primary">Add Vehicle Location</a>
        </div>

        <div class="app-ecommerce">
            <!-- Vehicle Location List -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Vehicle Locations</h5>
                </div>
                <div class="card-body">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicleLocations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->address }}</td>
                                <td>
                                    <a href="{{ route('admin.vehicle_locations.edit', $location->id) }}" class="item-edit"><i class="bx bxs-edit"></i></a>
                                    <a href="javascript:;" class="item-delete text-danger" data-id="{{ $location->id }}"><i class='bx bx-trash-alt'></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Vehicle Location List -->
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.item-delete').on('click', function() {
            var _this = $(this);
            var locationId = $(this).data('id');
            if (confirm('Are you sure you want to delete this vehicle location?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route("admin.vehicle_locations.destroy", ":id") }}'.replace(':id', locationId),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.success);
                        _this.closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while deleting the vehicle location: ' + error);
                    }
                });
            }
        });
    });
</script>

@endsection
