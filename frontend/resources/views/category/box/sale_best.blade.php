<?php
$sale_bests = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url')->where('category_type', config()->get('constants.CATEGORY_TYPE_SALE_BEST'))->take(5)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if(!empty((array)$sale_bests))
<!--Dự án bán chạy Start-->
<div class="kf_aside_post_wrap aside_hdg">
    <h5> Dự án bán chạy </h5>
    <ul>
        @foreach($sale_bests as $post)
        <li>
            <figure>
                <a href="{{$post->share_url}}" title="{{$post->title}}">
                    <img width="100" height="56" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                </a>
            </figure>
            <div class="kf_aside_post_des">
                <h6><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h6>
                <a href="https://www.facebook.com/sharer.php?u={{ config()->get('constants.FRONTEND_URL') . $post->share_url }}" target="_blank" rel="nofollow"
                   onclick="return !window.open(this.href, 'Facebook', 'width=600,height=500')" title="Chia sẻ bài viết qua Facebook" class="dx_btn_share_fb"><i class="fa fa-facebook-official"> Chia sẻ</i></a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<!--Dự án bán chạy End-->
<div class="clearfix"></div>
@endif