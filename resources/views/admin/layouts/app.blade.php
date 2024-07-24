<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Pos System</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/default/select2/css/select2.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/default/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        @include('admin.includes.header')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        @include('admin.includes.sidebar')
        <!-- Start Content-->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- container -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/css/default/apexchart/apexcharts.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/css/default/apexchart/chart-data.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/css/default/sweetalert/sweetalert2.all.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/css/default/sweetalert/sweetalerts.min.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/js/theme-script.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}" type="8c3c6b194b68e17fc7217ea3-text/javascript"></script>
    <script src="{{ asset('assets/js/rocket-loader.min.js') }}" data-cf-settings="8c3c6b194b68e17fc7217ea3-|49" defer></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <!-- <script type="a2ed06078a827c6500801d98-text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="a2ed06078a827c6500801d98-text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script type="a2ed06078a827c6500801d98-text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="a2ed06078a827c6500801d98-text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}" type="a2ed06078a827c6500801d98-text/javascript"></script>
    <script type="a2ed06078a827c6500801d98-text/javascript" src="{{ asset('assets/js/modernizr.js') }}"></script> -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" type="186635e1e8d6037529661056-text/javascript"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}" type="186635e1e8d6037529661056-text/javascript"></script>
    @yield('script')
</body>
</html>