@extends('layouts.default')
@section('content')
<div class="dx_property_content_wrap">
    @include('homepage.section.slider')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 dx_news_detail">
                    <div class="dx_news_detail_title"><h1>{{$post->title}}</h1></div>
                    <div class="clearfix"></div>
                    <br />
                    <div class="dx_news_detail_content">
                        @if($post->address)
                            <p>{{$post->address.', '.$post->subdistrict.', '.$post->district.', '.$post->province}}</p>
                        @endif
                        @if($post->price)
                            <p>Giá: <strong>{{$post->price}}</strong> </p>
                        @endif
                        <?php echo html_entity_decode($post->excerpt); ?>
                        <?php echo html_entity_decode($post->content); ?>
                    </div>
                    <br/>
                    <!-- div hiển thị các button chia sẻ -->
                    <div
                            class="addthis_inline_share_toolbox"
                            data-url="{{$post->share_url}}"
                            data-title="{{$post->title}}"
                            data-description="{{$post->title}}"
                            style="clear: both;"
                    >
                        <div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-7254a4fd-78b7-446c-af7a-b8eea75b3e62" role="region">
                            <span id="at-7254a4fd-78b7-446c-af7a-b8eea75b3e62" class="at4-visually-hidden">AddThis Sharing Buttons</span>
                            <div class="at-share-btn-elements">
                                <a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 2px;">
                                    <span class="at4-visually-hidden">Share to Facebook</span>
                                    <span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 32 32"
                                        version="1.1"
                                        role="img"
                                        aria-labelledby="at-svg-facebook-1"
                                        class="at-icon at-icon-facebook"
                                        style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"
                                >
                                    <title id="at-svg-facebook-1">Facebook</title>
                                    <g>
                                        <path
                                                d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z"
                                                fill-rule="evenodd"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                                    <span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Facebook</span>
                                </a>
                                <a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 2px;">
                                    <span class="at4-visually-hidden">Share to Twitter</span>
                                    <span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 32 32"
                                        version="1.1"
                                        role="img"
                                        aria-labelledby="at-svg-twitter-2"
                                        class="at-icon at-icon-twitter"
                                        style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"
                                >
                                    <title id="at-svg-twitter-2">Twitter</title>
                                    <g>
                                        <path
                                                d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336"
                                                fill-rule="evenodd"
                                        ></path>
                                    </g>
                                </svg>
                            </span>
                                    <span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Twitter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- scrip chia sẻ mạng xã hội -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e848f29c422c28"></script>
                    <div class="fb-comments col-md-12" data-href="{{$post->share_url}}" data-colorscheme="light" data-numposts="5" data-width="100%"></div>
                </div>
                <div class="col-md-3">
                    <!--Tin thị trường Start-->
                    @include('category.box.market_news')
                    <!--Tin thị trường End-->
                </div>
            </div>
        </div>
    </section>
</div>
<div class="clearfix"></div>
<!--DX Dự Án liên quan-->
@include('detail.box.related')
<!--DX Dự Án Vinhomes End-->
<!--Dx Dịch vụ tư vấn Start-->
<section class="dx_consulting_services_bg">
    <!--Heading Wrap Start-->
    <div class="dx_heading_1">
        <h3>DỊCH VỤ TƯ VẤN <strong>24/7</strong> &amp; HOÀN TOÀN <strong>MIỄN PHÍ</strong></h3>
        <p>
            Bởi chuyên viên bất động sản có bề dày kinh nghiệm và uy tín của Vietkaoland<br />
            sẵn sàng trợ giúp và cung cấp thông tin về dự án tới quý khách hàng.
        </p>
        <p>Vui lòng liên hệ <strong>0243.918.6789</strong></p>
    </div>
    <!--Heading Wrap End-->
</section>
<!--Dx Dịch vụ tư vấn End-->
@endsection
