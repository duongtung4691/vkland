<?php
$related_news = DB::table('posts')->select('id', 'title', 'share_url', 'thumbnail_url', 'address', 'subdistrict', 'district', 'province')->where('category_id', $post->category_id)->take(4)->skip(0)->orderBy('id', 'DESC')->get();
?>
@if (!empty((array)$related_news))
    <section class="dx_project_vihomes_bg">
        <div class="container">
            <!--Heading Wrap Start-->
            <div class="dx_heading_1"><h2>Dự án liên quan</h2></div>
            <!--Heading Wrap End-->
            <div class="kf_rent_property" style="opacity: 1; display: block;">
                <div style="width: 2280px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                    @foreach($related_news as $post)
                        <div style="width: 285px;float: left">
                            <div class="item dx_project_vihomes_list">
                                <a href="{{$post->share_url}}" title="{{$post->title}}">
                                    <img width="265px" height="149px" src="{{config()->get('constants.STATIC_IMAGES') . $post->thumbnail_url}}" alt="{{$post->title}}">
                                </a>
                                <h3><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                                @if ($post->address)
                                    <p>{{$post->address.($post->subdistrict ? ', '.$post->subdistrict : ' ').($post->district ? ', '.$post->district : ' ').($post->province ? ', '.$post->province : ' ')}}</p>
                                @endif
                                <div class="dx_line_button"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
