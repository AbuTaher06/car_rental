<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-bordered" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-bordered">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Car Rental</title>

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design">

    @include('admin.include.style')
</head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

            <!-- Sidebar -->
            @include('admin.include.side-bar')

            <div class="content">
                <!-- Header -->
                @include('admin.include.header')

                <div class="content-body">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>

                    <!-- Footer -->
                    @include('admin.include.footer')
                      <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


            </div>
        </div>


    @include('admin.include.js')
</body>
</html>
