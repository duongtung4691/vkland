<?php
$market_news = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url')->where('category_id', config()->get('constants.CATEGORY_ID_TINTHITRUONG'))->take(5)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if(!empty((array)$market_news))
<!--Tin thị trường Start-->
<div class="dx_widget_news">
    <h6>Tin thị trường</h6>
    <div class="dx_widget_news_list">
        <div class="dx_newspaper">
            <div><span>Bạn đã đọc những thông tin thị trường HOT nhất hôm nay chưa?</span></div>
            <div><i class="fa fa-newspaper-o"></i></div>
        </div>
        <div class=" clearfix"></div>
        <ul>
            @foreach($market_news as $post)
                <li><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!--Tin thị trường End-->
<div class="clearfix"></div>
@endif