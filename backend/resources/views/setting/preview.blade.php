<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta property="og:image"/>
    <title>Home</title>
    <link rel="apple-touch-icon" href="favicon.png">
    <link rel="icon" type="image/x-icon" href="favicon.png"/>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <link rel="icon" type="image/gif" href="favicon.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/color.min.css') }}"/>
</head>
<body>
<div class="dx_footer_bg">
    <div class="dx_footer_content">
        <div class="col-md-3 dx_footer_logo">
            <a href="#"><img width="225px" height="100px" src="{{ $contact['logo_company'] }}"></a>
        </div>
        <div class="col-md-5 dx_footer_about">
            <span>{{ $contact['company_contact'] }}</span>
            <p>Địa chỉ: {{ $contact['address_contact'] }}</p>
            <?php echo html_entity_decode($contact['copyright_left']); ?>
        </div>
        <div class="col-md-4 dx_footer_contact">
            <p>Tel: {{ $contact['telephone_contact'] }}</p>
            <p>Fax: <a href="tel:{{ $contact['fax_contact'] }}">{{ $contact['fax_contact'] }}</a></p>
            <p>Website: <a href="{{ $contact['website_contact'] }}">{{ $contact['website_contact'] }}</a></p>
            <p>Email: <a href="mailto:{{ $contact['email_contact'] }}">{{ $contact['email_contact'] }}</a></p>
            <?php echo html_entity_decode($contact['copyright_right']); ?>
        </div>
    </div> <!--Footer Mobile Start-->
    <div class="dx_footer_content_mobile">
        <div class="dx_footer_logo_mobile"> <a href="#">
            <img width="250px" height="120px" src="{{ $contact['logo_company'] }}"></a>
        </div>
        <div class="dx_line"></div>
        <div class="dx_footer_about_mobile">
            <span>{{ $contact['company_contact'] }}</span>
            <p>Địa chỉ: {{ $contact['address_contact'] }}</p>
            <p>Tel: {{ $contact['telephone_contact'] }}</p>
            <p>Email: <a href="mailto:{{ $contact['email_contact'] }}">{{ $contact['email_contact'] }}</a></p>
        </div>
        <div class="dx_footer_logo_mobile">
            <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=32695"><img style="width:200px;" src="{{ asset('assets/images/thong-bao-bo-cong-thuong.png') }}"></a>
        </div>
    </div> <!--Footer Mobile End -->
</div>
</body>
</html>
