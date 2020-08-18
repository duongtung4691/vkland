<?php
$setting = DB::table('settings')->where('key', '=', 'footer_info')->first();
if (!empty((array)$setting))
    $setting = json_decode($setting->value, true);
?>
<footer class="background-gray footer col-xs-12 noPadding" id="footer">
    <div class="container">
        <div class="footer-wrapper col-xs-12 noPadding">
            <div class="row">
                <div class="col-xs-12 col-md-12 footer-right">
                    <h3 class="footer-right-title text-uppercase">{{ $setting['company_contact'] ?? '' }}</h3>
                    <div class="footer-right-detail col-xs-12 noPadding">
                        Địa chỉ: {{ $setting['address_contact'] ?? '' }}<br>
                        Hotline: {{ $setting['telephone_contact'] ?? '' }}<br>
                        Email: <a href="mailto:{{ $setting['email_contact'] ?? '' }}">{{ $setting['email_contact'] ?? '' }}</a><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright col-xs-12 noPadding">
    <div class="container">
        <span class="pull-left">Copyright © {{ date('Y') }} {{ $setting['website_name'] ?? '' }}. All Rights Reserved</span>
    </div>
</div>