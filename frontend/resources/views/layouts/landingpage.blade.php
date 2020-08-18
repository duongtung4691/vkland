<!DOCTYPE html>
<html lang="vi">
<head>
    <title>{{ !empty($metaData['meta_title']) ? $metaData['meta_title'] : config()->get('constants.SEO_TITLE') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="QzTzq3sxi2VyFKPoH4U2hvniQTDt_BAC7H_ur4asg4g"/>
    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{config()->get('constants.FRONTEND_URL').'/favicon.png'}}">
    <meta name="robots" content="noindex, nofollow"/>
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
    <link rel='stylesheet' id='wp-block-library-css'  href='https://vinhthaicommunication.com/wp-includes/css/dist/block-library/style.min.css?ver=5.2.7' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css'  href='https://vinhthaicommunication.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.9' type='text/css' media='all' />
    <link rel='stylesheet' id='countdown-timer-style-css'  href='https://vinhthaicommunication.com/wp-content/plugins/countdown-timer-for-elementor/assets/css/countdown-timer-widget.css?ver=5.2.7' type='text/css' media='all' />
    <link rel='stylesheet' id='toc-screen-css'  href='https://vinhthaicommunication.com/wp-content/plugins/table-of-contents-plus/screen.min.css?ver=1509' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-pagenavi-css'  href='https://vinhthaicommunication.com/wp-content/plugins/wp-pagenavi/pagenavi-css.css?ver=2.70' type='text/css' media='all' />
    <link rel='stylesheet' id='signin-style-css'  href='https://vinhthaicommunication.com/wp-content/themes/vintas/style.css?ver=5.2.7' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css'  href='https://vinhthaicommunication.com/wp-content/themes/vintas/lib/css/bootstrap.min.css?ver=3.3.7' type='text/css' media='all' />
    <link rel='stylesheet' id='fontawesome-css'  href='https://vinhthaicommunication.com/wp-content/themes/vintas/lib/css/font-awesome.min.css?ver=4.7.0' type='text/css' media='all' />
    <link rel='stylesheet' id='owlcarousel-css'  href='https://vinhthaicommunication.com/wp-content/themes/vintas/lib/css/owl.carousel.min.css?ver=2.2.1' type='text/css' media='all' />
    <link rel='stylesheet' id='style-css'  href='https://vinhthaicommunication.com/wp-content/themes/vintas/lib/css/style.min.css?ver=1.0.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.4.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-animations-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=2.7.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=2.7.4' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-5-all-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=2.7.4' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-4-shim-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=2.7.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-global-css'  href='https://vinhthaicommunication.com/wp-content/uploads/elementor/css/global.css?ver=1571213115' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-2821-css'  href='https://vinhthaicommunication.com/wp-content/uploads/elementor/css/post-2821.css?ver=1593557881' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;subset=vietnamese&#038;ver=5.2.7' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.9.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-brands-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.9.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css'  href='https://vinhthaicommunication.com/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.9.0' type='text/css' media='all' />
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
<!--Landingpage Wrapper Start-->
<div class="dx_wrapper">
    <!--Header Wrap Start-->
    @include('layouts.landingpage.header')
    <!--Header Wrap End-->
    <!--Landingpage Content Start -->
    @yield('content')
    <!--Landingpage Content End -->
    <!--Footer Start-->
    @include('layouts.landingpage.footer')
    <!--Footer End-->
</div>
<!--Landingpage Wrapper End-->
</body>
</html>