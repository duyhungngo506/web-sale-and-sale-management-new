<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('uplon\assets\images\favicon.ico') }}">

    <!-- Table datatable css -->
    <link href="{{ asset('uplon\assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('uplon\assets\libs\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">

    <link href="{{ asset('uplon\assets\libs\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('uplon\assets\libs\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('uplon\assets\libs\datatables\select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="{{ asset('uplon\assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="{{ asset('uplon\assets\css\app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('admin.partials.header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')

            <!-- Footer Start -->
            @include('admin.partials.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->



    <!-- Vendor js -->
    <script src="{{ asset('uplon\assets\js\vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('uplon\assets\js\app.min.js') }}"></script>
    <!-- Page js -->
    <!-- Datatable plugin js -->
    <script src="{{ asset('uplon\assets\libs\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('uplon\assets\libs\datatables\dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('uplon\assets\libs\datatables\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('uplon\assets\libs\datatables\responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('uplon\assets\libs\datatables\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('uplon\assets\libs\datatables\buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('uplon\assets\libs\jszip\jszip.min.js') }}"></script>
    <script src="{{ asset('uplon\assets\libs\pdfmake\pdfmake.min.js') }}"></script>
    {{-- <script src="{{ asset('uplon\assets\libs\pdfmake\vfs_fonts.js') }}"></script> --}}

    <script src="{{ asset('uplon\assets\libs\datatables\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('uplon\assets\libs\datatables\buttons.print.min.js') }}"></script>

    <script src="{{ asset('uplon\assets\libs\datatables\dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('uplon\assets\libs\datatables\dataTables.select.min.js') }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset('uplon\assets\js\pages\datatables.init.js') }}"></script>

    @yield('scripts')

</body>

</html>
