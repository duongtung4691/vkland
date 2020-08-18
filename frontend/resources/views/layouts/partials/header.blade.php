<?php
$setting = DB::table('settings')->where('key', '=', 'footer_info')->first();
if (!empty((array)$setting))
    $setting = json_decode($setting->value, true);
?>
<header>
    <!--Menu Pc Start-->
    <div class="dx_logo_nav_wrap">
        <div class="dx_logo_nav_wrap_content">
            <div class="dx_logo"><a href="/"><img src="{{config()->get('constants.BACKEND_URL')}}{{ $setting['logo_header_company'] ?? '' }}" alt="Vietkaoland" height="50px"></a></div>
            <div class="dx_main_navigation">
                <ul class="nav navbar-nav">
                    <li class='active'><a href="/" title="Trang Chủ">Trang Chủ</a></li>
                    <li><a href="{{ url('ban-bat-dong-san') }}" title="Bán BĐS">Bán BĐS</a>
                        <!--
                        <ul>
                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/nghi-duong">BĐS Nghỉ Dưỡng</a></li>
                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/lien-ke-biet-thu">Liền kề - Biệt thự</a></li>
                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/chung-cu">Chung cư</a></li>
                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/dai-do-thi-vinhomes">Dự Án Vinhomes</a></li>
                        </ul> --> </li>
                    <li><a href="{{ url('cho-thue-bat-dong-san') }}" title="Cho thuê BĐS">Cho thuê BĐS</a>
                        <!--
                        <ul>
                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/van-phong">Văn phòng</a></li>
                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/mat-bang-thuong-mai">Mặt bằng thương mại</a></li>
                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/cho-thue-chung-cu">Chung cư</a></li>
                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/nha-pho">Nhà phố</a></li>
                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/can-ho-dich-vu">Căn Hộ Dịch Vụ</a></li>
                        </ul> --> </li>
                    <li><a>Đào tạo</a>
                        <ul>
                            <li><a href="https://daotao.vietkaoland.com" title="Chứng chỉ môi giới bất động sản">Chứng chỉ môi giới bất động sản</a></li>
                        </ul>
                    </li>
                    <li><a href="https://truyenthong.vietkaoland.com" title="Truyền thông bất động sản">Truyền thông bất động sản</a></li>
                    <li><a href="{{ url('tin-tuyen-dung') }}" title="Tin tuyển dụng">Tin tuyển dụng</a></li>
                </ul>
            </div>
            <div class="dx_menu_scl_icon">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/VietKao-Land-109964863827104" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--Menu Pc End-->
    <div class="dx_logo_nav_wrap_mobile">
        <div id="dx-responsive-navigation" class="dl-menuwrapper">
            <button class="dl-trigger">Open Menu</button>
            <ul class="dl-menu">
                <li class="active"><a href="/" title="Trang chủ">Trang Chủ</a></li>
                <li class="menu-item dx-parent-menu"><a href="{{ url('ban-bat-dong-san') }}" title="Bán BĐS">Bán BĐS</a>
                    {{--                    <ul class="dl-submenu">--}}
                    {{--                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/nghi-duong">BĐS Nghỉ Dưỡng</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/lien-ke-biet-thu">Liền kề - Biệt thự</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/chung-cu">Chung cư</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/ban-bat-dong-san/dai-do-thi-vinhomes">Dự Án Vinhomes</a></li>--}}
                    {{--                    </ul>--}}
                </li>
                <li class="menu-item dx-parent-menu"><a href="{{ url('cho-thue-bat-dong-san') }}" title="Cho thuê BĐS">Cho thuê BĐS</a>
                    {{--                    <ul class="dl-submenu">--}}
                    {{--                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/van-phong">Văn phòng</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/mat-bang-thuong-mai">Mặt bằng thương mại</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/cho-thue-chung-cu">Chung cư</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/nha-pho">Nhà phố</a></li>--}}
                    {{--                        <li><a href="http://vietkaoland.com/cho-thue-bat-dong-san/can-ho-dich-vu">Căn Hộ Dịch Vụ</a></li>--}}
                    {{--                    </ul>--}}
                </li>
                <li><a>Đào tạo</a>
                    <ul>
                        <li><a href="https://daotao.vietkaoland.com" title="Chứng chỉ môi giới bất động sản">Chứng chỉ môi giới bất động sản</a></li>
                    </ul>
                </li>
                <li><a href="https://truyenthong.vietkaoland.com" title="Truyền thông bất động sản">Truyền thông bất động sản</a></li>
                <li><a href="{{ url('tin-tuyen-dung') }}" title="Tin tuyển dụng">Tin tuyển dụng</a></li>
            </ul>
        </div>
        <div class="dx_logo_mobile"><a href="/"><img src="{{config()->get('constants.BACKEND_URL')}}{{ $setting['logo_header_company'] ?? '' }}" alt="Vietkaoland"></a></div>
    </div>
</header>
