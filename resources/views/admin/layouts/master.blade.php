<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
    <base href="{{asset('')}}">
    <!-- Custom fonts for this template-->
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/admin/css/css.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/admin/css/toastr.css">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
@include('admin.layouts.menu')
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
        @include('admin.layouts.header')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->


                <!-- Content Row -->

            @yield('content')
            <!-- Content Row -->


                <!-- Content Row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->


<!-- Logout Modal-->


<!-- Bootstrap core JavaScript-->
<script src="assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/admin/js/sb-admin-2.min.js"></script>
<script src="assets/admin/js/ajax.js"></script>
<script src="assets/admin/js/toastr.min.js"></script>

<!-- Page level plugins -->
<!-- Page level custom scripts -->

</body>

</html>
