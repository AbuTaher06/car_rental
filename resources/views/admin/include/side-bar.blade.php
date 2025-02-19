<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 bg-light">
    <nav class="navbar bg-light navbar-light">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-car me-2"></i>Car Rental</h3>
        </a>

        <!-- User Info -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg')}}" alt="User" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <!-- Cars Section -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('admin/cars*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                    <i class="fa fa-car me-2"></i>Cars
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.cars.index') }}" class="dropdown-item">Car List</a>
                    <a href="{{ route('admin.cars.create') }}" class="dropdown-item">Add Car</a>
                </div>
            </div>

            <!-- Rentals Section -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('admin/rentals*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                    <i class="fa fa-calendar-check me-2"></i>Rentals
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.rentals.index') }}" class="dropdown-item">Rental List</a>
                    <a href="{{ route('admin.rentals.create') }}" class="dropdown-item">Add Rental</a>
                </div>
            </div>

            <!-- Customers Section -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ request()->is('admin/customers*') ? 'active' : '' }}" data-bs-toggle="dropdown">
                    <i class="fa fa-users me-2"></i>Customers
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.customers.index') }}" class="dropdown-item">Customer List</a>
                    <a href="{{ route('admin.customers.create') }}" class="dropdown-item">Add Customer</a>
                </div>
            </div>

            <a href="widget.html" class="nav-item nav-link">
                <i class="fa fa-th me-2"></i>Widgets
            </a>
            <a href="form.html" class="nav-item nav-link">
                <i class="fa fa-keyboard me-2"></i>Forms
            </a>
            <a href="table.html" class="nav-item nav-link">
                <i class="fa fa-table me-2"></i>Tables
            </a>
            <a href="chart.html" class="nav-item nav-link">
                <i class="fa fa-chart-bar me-2"></i>Charts
            </a>

            <!-- Pages Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="far fa-file-alt me-2"></i>Pages
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
