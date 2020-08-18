@extends('layouts.default')
@section('content')
@if (!empty((array)$posts))
<div class="dx_property_content_wrap">
    @include('homepage.section.slider')
    <div class="clearfix"></div>
    <!--DX Content Wrap Start-->
    <section class="dx_sell_list">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="dx_sell_list_detail">
                        <div class="dx_sell_list_title_detail">
                            <h1> Danh sách{{ $category->name !== 'Tin tuyển dụng' ? ' các dự án' : '' }} {{$category->name}} </h1>
                        </div>
                        @foreach($posts as $post)
                            <div class="col-md-4" style="padding: 5px !important;">
                                <div class="dx_project_hot_list">
                                    <a href="{{$post->share_url}}" title="{{$post->title}}">
                                        <img width="380" height="214" src="{{config()->get('constants.STATIC_IMAGES').$post->thumbnail_url}}" alt="{{$post->title}}">
                                    </a>
                                    <h2><a href="{{$post->share_url}}" title="{{$post->title}}">{{$post->title}}</a></h2>
                                    @if($post->address)
                                        <p>{{$post->address.', '.$post->subdistrict.', '.$post->district.', '.$post->province}}</p>
                                    @endif
                                    @if($post->price)
                                        <p>Giá: <strong>{{$post->price}}</strong> </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $posts->links() }}
                </div>
                <div class="col-md-3">
                    <div class="dx_widget_bg">
                        @include('category.box.sale_best')
                        @include('category.box.market_news')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--DX Content Wrap End-->
</div>
@endif
@endsection
