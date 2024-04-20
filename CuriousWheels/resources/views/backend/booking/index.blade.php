@extends('backend.layouts.main')
@php
    $user = auth()->user();
@endphp
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="py-3 mb-0">
                    <span class="text-muted fw-light">Bookings /</span> All Bookings <!-- Change the title here -->
                </h4>
            </div>

            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-basic table border-top" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Vehicle</th>
                                <th>User</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Pickup Location</th>
                                <th>Status</th>
                                <th>Actions</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                        @if ($bookings->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No bookings available</td>
                            </tr>
                        @else
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->vehicle->make }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->end_date }}</td>
                                    <td>{{ $booking->pickup_location }}</td>
                                    <td>{{ $booking->booking_status }}</td>
                                    <td >
                                        <div class="d-flex" style="    align-items: baseline;">
                                            @if ($user && $user->hasRole('admin'))
                                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="item-show"><i class='bx bx-show'></i></a>
                                            <a href="javascript:;" class="item-delete text-danger" data-id="{{ $booking->id }}"><i class='bx bx-trash-alt'></i></a>
                                            <a href="{{ route('bookings.downloadInvoice', $booking->id) }}" class="item-download mr-2"><i class="bx bx-download"></i></a>

                                                @if ($booking->booking_status != 'accepted' && $booking->booking_status != 'rejected')
                                                    <form action="{{ route('admin.bookings.changeStatus', $booking->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="accepted"> <!-- Hidden input for accept status -->
                                                        <a href="#" class=" text-success  submit_form"><i class="bx bx-check"></i></a>

                                                    </form>
                                                    <form action="{{ route('admin.bookings.changeStatus', $booking->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="rejected"> <!-- Hidden input for reject status -->
                                                        <a href="#" class="text-danger  pl-1 reject_form"><i class="bx bx-x"></i></a>
                                                    </form>
                                                @endif
                                            @endif
                                            @if ($user && $user->hasRole('user'))
                                                <a href="{{ route('user.bookings.show', $booking->id) }}" class="item-show"><i class='bx bx-show'></i></a>
                                                <a href="{{ route('bookings.downloadInvoice', $booking->id) }}" class="item-download mr-2"><i class="bx bx-download"></i></a>

                                            @endif
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

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
                var bookingId = $(this).data('id');
                if (confirm('Are you sure you want to delete this booking?')) {
                    $.ajax({.
                        type: 'DELETE',
                        url: '{{ route("admin.bookings.destroy", ":id") }}'.replace(':id', bookingId),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message);
                            _this.closest('tr').remove();

                            // Optionally, you can reload the page or update the table
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred while deleting the booking: ' + error);
                        }
                    });
                }
            });
            $('.reject_form').click(function(event) {
                event.preventDefault();
                var form = $(this).closest('form');
                if (form.length > 0) {
                    form.submit();
                } else {
                    console.error('Form not found!');
                }
            });
        });
    </script>
@endsection
