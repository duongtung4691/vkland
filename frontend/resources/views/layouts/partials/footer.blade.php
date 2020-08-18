<?php
$setting = DB::table('settings')->where('key', '=', 'footer_info')->first();
if (!empty((array)$setting))
    $setting = json_decode($setting->value, true);
?>
<div class="dx_footer_bg">
    <div class="dx_footer_content">
        <div class="col-md-3 dx_footer_logo"><a href="/"><img style="height:100px" src="{{config()->get('constants.BACKEND_URL')}}{{ $setting['logo_company'] ?? '' }}"></a></div>
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
        <div class="dx_line"></div>
        <div class="dx_footer_about_mobile">
            <span>{{ $setting['company_contact'] ?? '' }}</span>
            <p>Địa chỉ: {{ $setting['address_contact'] ?? '' }}</p>
            <p>Tel: {{ $setting['telephone_contact'] ?? '' }}</p>
            <p>Email: <a href="mailto:{{ $setting['email_contact'] ?? '' }}">{{ $setting['email_contact'] ?? '' }}</a></p>
        </div>
    </div>
</div>
<div class="dx_footer_copyright">
    <p style="display: inline-block">Copyright <i class="fa fa-copyright"></i> {{ date('Y') }} {{ $setting['website_name'] ?? '' }}. All Right Reserved</p>
</div>
<div class="social-button">
    <div class="social-button-content">
        <a href="tel:{{ $setting['telephone_contact'] ?? '' }}" class="call-icon" rel="nofollow">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            <div class="animated alo-circle"></div>
            <div class="animated alo-circle-fill"></div>
            <span>{{ $setting['telephone_contact'] ?? '' }}</span>
        </a>
    </div>
</div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
<div class="zalo-share-button" data-href="" data-oaid="37009542848901920" data-layout="2" data-color="blue" data-customize=false></div>
