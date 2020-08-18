<?php
$hot_events = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url')->where('category_id', config()->get('constants.CATEGORY_ID_SUKIENNONG'))->take(4)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if (!empty((array)$hot_events))
<!--DX Chuyển nhượng dự án Start-->
<section class="dx_hot_events_bg">
    <div class="container">
        <!--Heading Wrap Start-->
        <div class="dx_heading_1"><h2>Chuyển nhượng dự án</h2></div>
        <!--Heading Wrap End-->
        <div class="kf_agent_slider owl-carousel owl-theme">
            @foreach($hot_events as $post)
                <div class="item dx_hot_events_list">
                    <a href="{{$post->share_url}}" title="{{$post->title}}">
                        <img width="245px" height="138px" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                    </a>
                    <span><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></span>
                    <div class="dx_hot_events_open"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--DX Chuyển nhượng dự án End-->
@endif
