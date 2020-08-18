<h1 id="heding-h1"><strong>Công ty cổ phần dịch vụ và địa ốc Đất Xanh Miền Bắc</strong></h1>
<?php
$market_news1 = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url')->where('category_id', config()->get('constants.CATEGORY_ID_TINTHITRUONG'))->take(3)->skip(0)->orderBy('id', 'DESC')->get();
$market_news2 = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url')->where('category_id', config()->get('constants.CATEGORY_ID_TINTHITRUONG'))->take(3)->skip(3)->orderBy('id', 'DESC')->get();
?>
@if (!empty((array)$market_news1))
<!--DX Tin Thị Trường Start-->
<section class="dx_market_news_bg">
    <div class="container">
        <!--Heading Wrap Start-->
        <div class="dx_heading_1"><h2>Tin thị trường</h2></div>
        <!--Heading Wrap End-->
        <div class="row">
            <div class="col-md-6 col-ms-6 col-xs-12">
                @foreach($market_news1 as $post)
                    <div class="dx_market_news_list">
                        <a href="{{$post->share_url}}" title="{{$post->title}}">
                            <img width="135" height="90" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                        </a>
                        <h3><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                    </div>
                @endforeach
            </div>
            @if (!empty((array)$market_news2))
            <div class="col-md-6 col-ms-6 col-xs-12">
                @foreach($market_news2 as $post)
                    <div class="dx_market_news_list">
                        <a href="{{$post->share_url}}" title="{{$post->title}}">
                            <img width="135" height="90" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                        </a>
                        <h3><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                    </div>
                @endforeach
            </div>
            @endif
            {{--<div class="dx_button_all col-md-12 col-sm-12 col-xs-12">--}}
                {{--<button class="dx_md_btn dx_btn_1"><a href="http://vietkaoland.com/tin-tuc-bat-dong-san">Xem thêm</a></button>--}}
            {{--</div>--}}
        </div>
    </div>
</section>
<!--DX Tin Thị Trường End-->
@endif