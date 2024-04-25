@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="py-3 mb-0">
                    <span class="text-muted fw-light">Document Types /</span> All Document Types
                </h4>
                <a href="{{ route('admin.document_types.create') }}" class="btn btn-primary">Add Document Type</a>
            </div>

            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentTypes as $documentType)
                                <tr>
                                    <td>{{ $documentType->id }}</td>
                                    <td>{{ $documentType->name }}</td>
                                    <td>{{ $documentType->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.document_types.edit', ['documentType' => $documentType->id]) }}" class="item-edit"><i class="bx bxs-edit"></i></a>
                                        <a href="javascript:;" class="item-delete text-danger" data-id="{{ $documentType->id }}"><i class='bx bx-trash-alt'></i></a>
                                    </td>
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
                var documentTypeId = $(this).data('id');
                if (confirm('Are you sure you want to delete this document type?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("admin.document_types.destroy", ":documentType") }}'.replace(':documentType', documentTypeId),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            _this.closest('tr').remove();
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred while deleting the document type: ' + error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
