<?php
$sale_opens = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url', 'address', 'subdistrict', 'district', 'province')->where('category_type', config()->get('constants.CATEGORY_TYPE_SALE_OPEN'))->take(4)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if (!empty((array)$sale_opens))
<!--DX Dự Án Sắp Mở Bán Start-->
<section class="dx_project_imminent_sale_bg">
    <div class="container">
        <!--Heading Wrap Start-->
        <div class="dx_heading_1"><h2>Dự án sắp mở bán</h2></div>
        <!--Heading Wrap End-->
        <div class="kf_agent_slider owl-carousel owl-theme">
            @foreach($sale_opens as $post)
                <div class="item dx_project_imminent_sale_list">
                    <a href="{{$post->share_url}}" title="{{$post->title}}">
                        <img width="245px" height="138px" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                    </a>
                    <span><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></span>
                    @if($post->address)
                        <p>{{$post->address.', '.$post->subdistrict.', '.$post->district.', '.$post->province}}</p>
                    @endif
                    <div class="dx_line_button"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--DX Dự Án Sắp Mở Bán End-->
@endif
