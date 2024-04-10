@extends('backend.layouts.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="py-3 mb-0">
                    <span class="text-muted fw-light">Blogs /</span> All Blogs <!-- Change the title here -->
                </h4>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add Blog</a>
            </div>

            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>
                                        <a href="{{ route('admin.blogs.show', $blog->id) }}" class="item-show"><i class='bx bx-show'></i></a>
                                        <a href="{{ route('admin.blogs.edit', ['id' => $blog->id]) }}" class="item-edit"><i class="bx bxs-edit"></i></a>
                                        <a href="javascript:;" class="item-delete text-danger" data-id="{{ $blog->id }}"><i class='bx bx-trash-alt'></i></a>
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
                var blogId = $(this).data('id');
                if (confirm('Are you sure you want to delete this blog?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("admin.blogs.destroy", ":id") }}'.replace(':id', blogId),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            _this.closest('tr').remove();

                            // Optionally, you can reload the page or update the table
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred while deleting the blog: ' + error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
