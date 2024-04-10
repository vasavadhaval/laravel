@extends('backend.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="py-3 mb-0">
                <span class="text-muted fw-light">Vehicle Types /</span><span> All Vehicle Types</span>
            </h4>
            <a href="{{ route('admin.vehicle_types.create') }}" class="btn btn-primary">Add Vehicle Types</a>
        </div>


        <div class="app-ecommerce">
            <!-- Vehicle Type List -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Vehicle Types</h5>
                </div>
                <div class="card-body">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicleTypes as $vehicleType)
                            <tr>
                                <td>{{ $vehicleType->id }}</td>
                                <td>{{ $vehicleType->name }}</td>
                                <td>
                                    <a href="{{ route('admin.vehicle_types.edit', $vehicleType->id) }}" class="item-edit"><i class="bx bxs-edit"></i></a>
                                    <a href="javascript:;" class="item-delete text-danger" data-id="{{ $vehicleType->id }}"><i class='bx bx-trash-alt'></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Vehicle Type List -->
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.item-delete').on('click', function() {
            var _this = $(this);
            var vehicleTypeId = $(this).data('id');
            if (confirm('Are you sure you want to delete this vehicle type?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route("admin.vehicle_types.destroy", ":id") }}'.replace(':id', vehicleTypeId),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.success);
                        _this.closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while deleting the vehicle type: ' + error);
                    }
                });
            }
        });
    });
</script>

@endsection
