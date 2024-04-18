@php
    $user = auth()->user();
@endphp
<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">

                <svg width="200" height="200" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <!-- Define the path resembling "CW" -->
                        <path
                            d="M7,30 C10,22 15,22 18,30 C18,24 22,24 18,18 C16,16 14,16 12,18 C8,24 12,24 12,30 C12,32 10,34 10,36 C8,34 6,32 6,30 Z"
                            id="path-cw" />
                    </defs>
                    <!-- Draw the CW path -->
                    <g id="letters-cw" fill="#696cff">
                        <use xlink:href="#path-cw" />
                    </g>
                </svg>



            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">CW</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        @if ($user && $user->hasRole('admin'))
            <li class="menu-item{{ request()->is('admin/dashboard*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                    <span class="badge badge-center rounded-pill bg-danger ms-auto">1</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/dashboard') ? ' active' : '' }}">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Home">Home</div>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Apps & Pages -->

            <li class="menu-item{{ request()->is('admin/vehicles*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-car"></i>
                    <div class="text-truncate" data-i18n="Vehicles">Vehicles</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/vehicles') ? ' active' : '' }}">
                        <a href="{{ route('admin.vehicles.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Vehicle List">Vehicle List</div>
                        </a>
                    </li>
                    <li class="menu-item{{ request()->is('admin/vehicles/create') ? ' active' : '' }}">
                        <a href="{{ route('admin.vehicles.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Add Vehicle">Add Vehicle</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item{{ request()->is('admin/vehicle-types*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-car"></i>
                    <div class="text-truncate" data-i18n="Vehicle Types">Vehicle Types</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/vehicle-types') ? ' active' : '' }}">
                        <a href="{{ route('admin.vehicle_types.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Vehicle Type List">Vehicle Type List</div>
                        </a>
                    </li>
                    <li class="menu-item{{ request()->is('admin/vehicle-types/create') ? ' active' : '' }}">
                        <a href="{{ route('admin.vehicle_types.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Add Vehicle Type">Add Vehicle Type</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item{{ request()->is('admin/vehicle-locations*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-map"></i>
                    <div class="text-truncate" data-i18n="Vehicle Locations">Vehicle Locations</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/vehicle-locations') ? ' active' : '' }}">
                        <a href="{{ route('admin.vehicle_locations.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Vehicle Location List">Vehicle Location List</div>
                        </a>
                    </li>
                    <li class="menu-item{{ request()->is('admin/vehicle-locations/create') ? ' active' : '' }}">
                        <a href="{{ route('admin.vehicle_locations.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Add Vehicle Location">Add Vehicle Location</div>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="menu-item{{ request()->is('admin/users*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div class="text-truncate" data-i18n="Users">Users</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/users') ? ' active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="User List">User List</div>
                        </a>
                    </li>
                    <li class="menu-item{{ request()->is('admin/users/create') ? ' active' : '' }}">
                        <a href="{{ route('admin.users.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Add User">Add User</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item{{ request()->is('admin/blogs*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-news"></i>
                    <div class="text-truncate" data-i18n="Blogs">Blogs</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/blogs') ? ' active' : '' }}">
                        <a href="{{ route('admin.blogs.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Blog List">Blog List</div>
                        </a>
                    </li>
                    <li class="menu-item{{ request()->is('admin/blogs/create') ? ' active' : '' }}">
                        <a href="{{ route('admin.blogs.create') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Add Blog">Add Blog</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Add this code snippet where you define your admin menu -->

            <li class="menu-item{{ request()->is('admin/bookings*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-car"></i>
                    <div class="text-truncate" data-i18n="Bookings">Bookings</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('admin/bookings') ? ' active' : '' }}">
                        <a href="{{ route('admin.bookings.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Booking List">Booking List</div>
                        </a>
                    </li>
                    <!-- You can add more submenu items for bookings here if needed -->
                </ul>
            </li>

        @endif

        @if ($user && $user->hasRole('user'))
            <li class="menu-item{{ request()->is('user/dashboard*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                    <span class="badge badge-center rounded-pill bg-danger ms-auto">1</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('user/dashboard') ? ' active' : '' }}">
                        <a href="{{ route('user.dashboard') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="Home">Home</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item{{ request()->is('user/bookings*') ? ' active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-car"></i>
                    <div class="text-truncate" data-i18n="My Bookings">My Bookings</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item{{ request()->is('user/bookings') ? ' active' : '' }}">
                        <a href="{{ route('user.bookings.index') }}" class="menu-link">
                            <div class="text-truncate" data-i18n="My Booking List">My Booking List</div>
                        </a>
                    </li>
                    <!-- You can add more submenu items for bookings here if needed -->
                </ul>
            </li>

        @endif

    </ul>
</aside>
