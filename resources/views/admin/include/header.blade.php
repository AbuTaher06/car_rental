<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm px-4 py-2">
    <div class="container-fluid">
        <!-- Sidebar Toggle Button -->
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Search Bar (Visible on larger screens) -->
        <div class="collapse navbar-collapse ms-4" id="navbarNav">
            <form class="d-none d-md-flex ms-4">
                <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>

        <!-- Navbar Items (Messages, Notifications, User Profile) -->
        <div class="navbar-nav ms-auto d-flex align-items-center">
            <!-- Messages Dropdown -->
            <div class="nav-item dropdown me-3">
                <a href="#" class="nav-link dropdown-toggle" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline">Messages</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li><a class="dropdown-item" href="#">John sent you a message</a></li>
                    <li><a class="dropdown-item" href="#">Jane replied to your comment</a></li>
                    <li><a class="dropdown-item text-center" href="#">See all messages</a></li>
                </ul>
            </div>

            <!-- Notifications Dropdown -->
            <div class="nav-item dropdown me-3">
                <a href="#" class="nav-link dropdown-toggle" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline">Notifications</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li><a class="dropdown-item" href="#">Profile updated</a></li>
                    <li><a class="dropdown-item" href="#">New user added</a></li>
                    <li><a class="dropdown-item" href="#">Password changed</a></li>
                    <li><a class="dropdown-item text-center" href="#">See all notifications</a></li>
                </ul>
            </div>

            <!-- User Profile Dropdown -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/img/user.jpg') }}" class="rounded-circle me-2" width="35" height="35" alt="User">
                    <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->

