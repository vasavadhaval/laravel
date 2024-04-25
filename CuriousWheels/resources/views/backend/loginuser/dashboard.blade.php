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
                        <h5 class="card-title text-primary">Your Bookings Count</h5>
                        <p class="mb-4">Total bookings you have made: <span class="fw-medium">{{ $todayBookingsCount }}</span></p>

                        <a href="{{ route('user.bookings.index') }}" class="btn btn-sm btn-label-primary">View Your Bookings</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Your Documents ({{ $totalDocuments }})</h5>

                          @if (count($documents) > 0)
                            <ul class="list-group">
                              @foreach ($documents as $document)
                                <li class="list-group-item">
                                  {{ $document->title }} ({{ $document->created_at->format('d M Y') }})
                                  <a href="{{ $document->file_path }}" class="btn btn-sm btn-primary float-end">View</a>
                                </li>
                              @endforeach
                            </ul>
                          @else
                            <p>You don't have any documents uploaded yet.</p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


          </div>




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
