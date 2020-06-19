<?php
$setting = DB::table('settings')->where('key', '=', 'footer_info')->first();
if (!empty((array)$setting))
    $setting = json_decode($setting->value, true);
?>
<div class="dx_footer_bg">
    <div class="dx_footer_content">
        <div class="col-md-3 dx_footer_logo"><a href="/"><img width="225px" height="100px" src="{{config()->get('constants.STATIC_IMAGES')}}{{ $setting['logo_company'] ?? '' }}"></a></div>
        <div class="col-md-5 dx_footer_about">
            <span>{{ $setting['company_contact'] ?? '' }}</span>
            <p>Địa chỉ: {{ $setting['address_contact'] ?? '' }}</p>
            <p><?php echo html_entity_decode($setting['copyright_left']); ?></p>
        </div>
        <div class="col-md-4 dx_footer_contact">
            <p>Tel: {{ $setting['telephone_contact'] ?? '' }}</p>
            <p>Fax: <a href="tel:+{{ $setting['fax_contact'] ?? '' }}">{{ $setting['fax_contact'] ?? '' }}</a></p>
            <p>Website: <a href="http://{{ $setting['website_contact'] ?? '' }}">{{ $setting['website_contact'] ?? '' }}</a></p>
            <p>Email: <a href="mailto:{{ $setting['email_contact'] ?? '' }}">{{ $setting['email_contact'] ?? '' }}</a></p>
        </div>
    </div>
    <!--Footer Mobile Start-->
    <div class="dx_footer_content_mobile">
        <div class="dx_footer_logo_mobile"><a href="#"><img width="250px" height="120px" src="{{ config('constants.FRONTEND_URL') . '/assets/images/thong-bao-bo-cong-thuong.png' }}"></a></div>
        <div class="dx_line"></div>
        <div class="dx_footer_about_mobile">
            <span>{{ $setting['company_contact'] ?? '' }}</span>
            <p>Địa chỉ: {{ $setting['address_contact'] ?? '' }}</p>
            <p>Tel: {{ $setting['telephone_contact'] ?? '' }}</p>
            <p>Email: <a href="mailto:{{ $setting['email_contact'] ?? '' }}">{{ $setting['email_contact'] ?? '' }}</a></p>
        </div>
        <div class="dx_footer_logo_mobile"><a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=32695"><img style="width:200px;" src="{{ config('constants.FRONTEND_URL') . '/assets/images/thong-bao-bo-cong-thuong.png' }}"></a></div>
    </div>
</div>
<div class="dx_footer_copyright">
    <p style="display: inline-block">Copyright <i class="fa fa-copyright"></i> {{ date('Y') }} {{ $setting['website_name'] ?? '' }}. All Right Reserved</p>
    <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=32695"><img style="width:140px; margin-left: 20px" src="{{ config('constants.FRONTEND_URL') . '/assets/images/thong-bao-bo-cong-thuong.png' }}"></a> <a href="//www.dmca.com/Protection/Status.aspx?ID=3bf3f85c-1cbd-469d-b3d2-b455f4765c1a" title="DMCA.com Protection Status" class="dmca-badge"> <img
                src="https://images.dmca.com/Badges/DMCA_logo-grn-btn100w.png?ID=3bf3f85c-1cbd-469d-b3d2-b455f4765c1a" alt="DMCA.com Protection Status"/></a>
    <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
</div>