<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/ico" />

    <title>N2CMS</title>

    <!-- Bootstrap -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

    <!-- iCheck -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/css/custom_ext.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">

	<!-- add by: tiemtt - only for auto add tags -->
    <link href="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/css/tags_autocomplete.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/jquery/dist/jquery.min.js') }}"></script>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('layouts.partials.header')
                @include('layouts.partials.nav')
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Xem frontend" href="{{ config()->get('constants.FRONTEND_URL') }}" target="_blank">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
        @include('layouts.partials.profile')
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
        @include('layouts.partials.footer')
    </div>
</div>

@include('tools.ckeditor_default')
<!-- Bootstrap -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/js/tags_autocomplete.js') }}"></script>

<!-- Trang câu hỏi thường gặp -->
<!-- bootstrap-datetimepicker -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/iCheck/icheck.min.js') }}"></script>
<script>
    $('.myDatepicker').datetimepicker({
        //format: 'DD/MM/YYYY hh:mm:ss A',
        defaultDate: new Date()
    });
</script>
<!-- Custom Theme Scripts -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/js/custom.js') }}"></script>
<!-- PNotify -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
<!-- add by tiemtt: posts: tags, post, cate -->
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/js/tags.js') }}"></script>
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/js/faqs.js') }}"></script>
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/js/banner.js') }}"></script>
<script src="{{ asset(config()->get('constants.FOLDER_PUBLIC').'/assets/js/category_banner.js') }}"></script>

</body>
</html>
