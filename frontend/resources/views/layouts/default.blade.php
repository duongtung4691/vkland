<!DOCTYPE html>
<html lang="vi">
<head>
    <title>{{ !empty($metaData['meta_title']) ? $metaData['meta_title'] : config()->get('constants.SEO_TITLE') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="QzTzq3sxi2VyFKPoH4U2hvniQTDt_BAC7H_ur4asg4g"/>
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{config()->get('constants.FRONTEND_URL').'/favicon.png'}}">
    <meta name="robots" content="index, follow"/>
    <meta property='og:title' content="{{ !empty($metaData['meta_title']) ? $metaData['meta_title'] : config()->get('constants.SITE_NAME') }}" itemprop="headline"/>
    <meta property='og:description' content="{{ !empty($metaData['meta_description']) ? $metaData['meta_description'] : 'Dược phẩm Nhất Nhất' }}" itemprop="description"/>
    <meta property="og:url" content="{{ Request::fullUrl() }}" itemprop="url"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:site_name" content="<?php echo config()->get('constants.SITE_NAME') ?>" />
    <meta name="keywords" content=""/>
    <meta name="description" content="{{ !empty($metaData['meta_description']) ? $metaData['meta_description'] : config()->get('constants.SEO_DESCRIPTION') }}"/>
    <meta name="geo.region" content="VN-HN"/>
    <meta name="geo.position" content="21.002211;105.80573"/>
    <meta name="ICBM" content="21.002211, 105.80573"/>
    <meta property="fb:app_id" content="1056060257782954"/>
    <meta property="fb:admins" content="100001669386194"/>
    <link rel="canonical" href="http://vietkaoland.com/"/>
    <link href="/public/images/dxmb_favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link rel="author" href="https://plus.google.com/u/0/102871515468264026080/"/>
    <!-- twitter -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="{{ !empty($metaData['meta_title']) ? $metaData['meta_title'] : config()->get('constants.SITE_NAME') }}" />
    <meta name="twitter:description" content="{{ !empty($metaData['meta_description']) ? $metaData['meta_description'] : 'Dược phẩm Nhất Nhất' }}" />
    <!-- and twitter -->
    <!-- g+ -->
    <link rel="publisher" href="g+"/>
    <!-- and g+ -->
    <!--noscript id="deferred-styles"-->
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/typography.min.css?6') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/style.css?v=202005312237202020') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/vendor/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/jquery.bxslider.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/widget.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/dl-menu.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/shortcodes.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/color.min.css?v=202005312237202020') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/main.css?v=202005312237202020') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/custom.css?v=202005312237202020') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/frontend/gallery/component.min.css') }}" rel="stylesheet">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/css/common.css?v=202005312237202020') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,700,600&amp;subset=latin,latin-ext,devanagari">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&amp;subset=latin,greek,greek-ext,cyrillic-ext,cyrillic,latin-ext">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&amp;subset=latin,vietnamese,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&amp;subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic">
    <link href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/fancybox/jquery.fancybox.css') }}" media="screen">
    <script src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.js" data-turbolinks-track="true"></script>
    <!-- GOOGLE SEARCH META GOOGLE SEARCH STRUCTURED DATA FOR ARTICLE && GOOGLE BREADCRUMB STRUCTURED DATA-->
    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "Vietkaoland",
        "alternateName": "Công ty Bất Động Sản Việt KAO Land",
        "url": "http://vietkaoland.com"
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Vietkaoland",
        "url": "http://vietkaoland.com",
        "logo": "http://cms.vietkaoland.com/assets/images/logo/LOGO.png",
        "address": [
            {
                "@type": "PostalAddress",
                "streetAddress": "Số 21 liền kề 9, Khu nhà ở cục cảnh sát hình sự, Vạn Phúc, Hà Đông, Hà Nội.",
                "addressLocality": "Hà Nội City",
                "addressRegion": "Northeast",
                "postalCode": "100000",
                "addressCountry": "VNM"
            }
        ],
        "contactPoint": [
            { "@type": "ContactPoint", "telephone": "+0243-918-6789", "contactType": "customer service" }
        ]
    }
    </script>
    <!-- END GOOGLE SEARCH META GOOGLE SEARCH STRUCTURED DATA FOR ARTICLE && GOOGLE BREADCRUMB STRUCTURED DATA-->
    <style>
        .social-button{
            display: inline-grid;
            position: fixed;
            bottom: 15px;
            left: 45px;
            min-width: 45px;
            text-align: center;
            z-index: 99999;
        }
        .social-button-content{
            display: inline-grid;
        }
        .social-button a {padding:8px 0;cursor: pointer;position: relative;}
        .social-button i{
            width: 40px;
            height: 40px;
            background-color: red;
            color: #fff;
            border-radius: 100%;
            font-size: 20px;
            text-align: center;
            line-height: 1.9;
            position: relative;
            z-index: 999;
        }
        .social-button span{
            display: none;
        }
        .alo-circle {
            animation-iteration-count: infinite;
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-name: zoomIn;
            width: 50px;
            height: 50px;
            top: 3px;
            right: -3px;
            position: absolute;
            background-color: transparent;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            border: 2px solid rgba(30, 30, 30, 0.4);
            opacity: .1;
            border-color: #ff0000;
            opacity: .5;
        }
        .alo-circle-fill {
            animation-iteration-count: infinite;
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-name: pulse;
            width: 60px;
            height: 60px;
            top: -2px;
            right: -8px;
            position: absolute;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
            border: 2px solid transparent;
            background-color: #e9322d;
            opacity: .75;
        }
        .call-icon:hover > span, .mes:hover > span, .sms:hover > span, .zalo:hover > span{display: block}
        .social-button a span {
            border-radius: 2px;
            text-align: center;
            background-color: #ff0000;
            padding: 9px;
            display: none;
            width: 180px;
            margin-left: 10px;
            position: absolute;
            color: #ffffff;
            z-index: 999;
            top: 9px;
            left: 40px;
            transition: all 0.2s ease-in-out 0s;
            -moz-animation: headerAnimation 0.7s 1;
            -webkit-animation: headerAnimation 0.7s 1;
            -o-animation: headerAnimation 0.7s 1;
            animation: headerAnimation 0.7s 1;
        }
        @-webkit-keyframes "headerAnimation" {
            0% { margin-top: -70px; }
            100% { margin-top: 0; }
        }
        @keyframes "headerAnimation" {
            0% { margin-top: -70px; }
            100% { margin-top: 0; }
        }
        .social-button a span:before {
            content: "";
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 10px 10px 0;
            border-color: transparent #ff0000 transparent transparent;
            position: absolute;
            left: -10px;
            top: 10px;
        }
    </style>
</head>
<body>
<div id="fb-root"></div>
<script> (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1056060257782954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--Dat Xanh Wrapper Start-->
<div class="dx_wrapper">
    <!--Header Wrap Start-->
    @include('layouts.partials.header')
    <!--Header Wrap End-->
    <!--Dat Xanh Content Start -->
    @yield('content')
    <!-- Dat Xanh Content End -->
    <div class="clearfix"></div>
    <div class="fade in" id="bg-body-registerPopup"></div>
    <div class="hotline"><a href="tel:02439186789" style="color: #fff"> <i class="fa fa-phone fa-3"></i> <strong class="normal">Gọi ngay Hotline</strong> <strong class="smallest-mobile">Gọi Hotline</strong></a></div>
    <!--Footer Start-->
    @include('layouts.partials.footer')
    <!--Footer End-->
</div>
<!--Dat Xanh Wrapper End-->
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/bootstrap.min.js') }}"></script>
<script src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/vendor/daterangepicker/moment.min.js') }}"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/jquery.bxslider.min.js') }}"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/owl.carousel.min.js') }}"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/jquery.accordion.min.js') }}"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/jquery-filterable.min.js') }}"></script>
<script rel="dns-prefetch" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/dl-menu/jquery.dlmenu.js') }}"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/custom.min.js') }}"></script>
<script src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/tableHeadFixer.js') }}"></script>
<script async src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/js.cookie-2.1.4.min.js') }}"></script>
<script src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/fancybox/jquery.fancybox.pack.js') }}"></script>
<script async type="text/javascript" src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/global.js?v=1590939439') }}"></script>
<script async type="text/javascript" src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/frontend.js?v=1590939439') }}" charset="utf-8"></script>
<script async type="text/javascript" src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/user.js?v=1590939439') }}"></script>
<script async type="text/javascript" src="{{ url(config()->get('constants.FOLDER_PUBLIC').'/assets/js/frontend/ez-plus/autoload.js?v=1590939439') }}"></script>
</body>
</html>
