<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'N2CMS') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link href="https://kendo.cdn.telerik.com/2018.2.516/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="https://kendo.cdn.telerik.com/2018.2.516/styles/kendo.metro.min.css" rel="stylesheet" type="text/css" />
    <link href="https://kendo.cdn.telerik.com/2018.2.516/styles/kendo.dataviz.min.css" rel="stylesheet" type="text/css" />
    <link href="https://kendo.cdn.telerik.com/2018.2.516/styles/kendo.dataviz.metro.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-fluid">
        <!--open container-->
        <div class="row row-offcanvas row-offcanvas-left">
            <!--open row-->
            <div id="nav-section" class="col-xs-12 column">
                @include('layouts.partials.header')
                @include('layouts.partials.nav')
            </div>
            <!--close left column-->
            <div id="main-section" class="col-xs-12 column">
                <!--open main column-->
                @yield('content')
            </div>
            <!--close main column-->
        </div>
        <!--close row-->
    </div>
    <!--close container-->

    <!-- Scripts -->
    <script src="https://kendo.cdn.telerik.com/2018.2.516/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.2.516/js/kendo.all.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.2.516/js/kendo.aspnetmvc.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
