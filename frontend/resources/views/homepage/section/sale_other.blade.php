<?php
$sale_others = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url', 'address', 'subdistrict', 'district', 'province', 'price')->where('category_type', config()->get('constants.CATEGORY_TYPE_SALE_OTHER'))->take(15)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if (!empty((array)$sale_others))
<section class="dx_project_hot_bg">
    <div class="container">
        <!--Heading Wrap Start-->
        <div class="dx_heading_1"><h2>DỰ ÁN BẤT ĐỘNG SẢN KHÁC</h2></div>
        <!--Heading Wrap End-->
        <div class="row">
            @foreach($sale_others as $post)
                <div class="col-md-4 col-sm-6">
                    <div class="dx_project_hot_list">
                        <a href="{{$post->share_url}}" title="{{$post->title}}">
                            <img width="340px" height="191px" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                        </a>
                        <h3><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                        @if($post->address)
                            <p>{{$post->address.', '.$post->subdistrict.', '.$post->district.', '.$post->province}}</p>
                        @endif
                        @if($post->price)
                            <p>Giá từ: <strong>{{$post->price}}</strong></p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
