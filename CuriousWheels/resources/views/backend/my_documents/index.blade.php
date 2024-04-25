@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="py-3 mb-0">
                    <span class="text-muted fw-light">My Documents /</span> All My Documents
                </h4>
                <a href="{{ route('user.documents.create') }}" class="btn btn-primary">Add Document</a>
            </div>

            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Document Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userDocuments as $userDocument)
                                <tr>
                                    <td>{{ $userDocument->id }}</td>
                                    <td><a href="{{ $userDocument->file_path }}" target="_blank">{{ $userDocument->title }}</a></td>
                                    <td>{{ $userDocument->documentType->name }}</td>
                                    <td>
                                        @if ($userDocument->is_approved === 0)
                                            <span class="badge bg-secondary">Pending</span>
                                        @elseif ($userDocument->is_approved === 1)
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($userDocument->is_approved === 2)
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-warning">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.documents.edit', $userDocument->id) }}" class="item-edit"><i class="bx bxs-edit"></i></a>
                                        <a href="javascript:;" class="item-delete text-danger" data-id="{{ $userDocument->id }}"><i class='bx bx-trash-alt'></i></a>
                                        <a href="{{ $userDocument->file_path }}" target="_blank">
                                            <i class="menu-icon tf-icons bx bx-file"></i>
                                        </a>
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
                var userDocumentId = $(this).data('id');
                if (confirm('Are you sure you want to delete this document?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("admin.user_documents.destroy", ":id") }}'.replace(':id', userDocumentId),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            _this.closest('tr').remove();
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred while deleting the document: ' + error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
