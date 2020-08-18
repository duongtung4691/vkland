<?php
$hot_events = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url', 'address', 'subdistrict', 'district', 'province')->where('category_type', config()->get('constants.CATEGORY_TYPE_SALE_HIGHLIGHT'))->take(4)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if (!empty((array)$hot_events))
<!--DX Dự Án Vinhomes Star-->
<section class="dx_project_vihomes_bg">
    <div class="container">
        <!--Heading Wrap Start-->
        <div class="dx_heading_1"><h2>DỰ ÁN NỔI BẬT</h2></div>
        <!--Heading Wrap End-->
        <div class="kf_rent_property owl-carousel owl-theme">
            @foreach($hot_events as $post)
                <div class="item dx_project_vihomes_list">
                    <a href="{{$post->share_url}}" title="{{$post->title}}">
                        <img width="265px" height="149px" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                    </a>
                    <h3><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                    @if($post->address)
                        <p>{{$post->address.', '.$post->subdistrict.', '.$post->district.', '.$post->province}}</p>
                    @endif
                    <div class="dx_line_button"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--DX Dự Án Vinhomes End-->
@endif
