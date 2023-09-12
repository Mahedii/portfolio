<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-layout-mode="dark" data-body-image="img-3" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Velzon - Admin & Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
    @include('Backend.layouts.head-css')
</head>

@section('body')
    @include('Backend.layouts.body')
@show

    <div id="toastr-alerts-container"></div>


    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('Backend.layouts.topbar')
        @include('Backend.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('Backend.layouts.footer')
            @include('Backend.layouts.custom-ajax-script')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('Backend.layouts.customizer')

    <!-- JAVASCRIPT -->
    @include('Backend.layouts.vendor-scripts')
</body>

</html>
