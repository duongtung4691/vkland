@extends('layouts.default')
@section('content')
<div class="dx_property_content_wrap">
    @include('homepage.section.slider')
    @include('homepage.section.search')
    @include('homepage.section.market_news')
    @include('homepage.section.hot_event')
    @include('homepage.section.sale_highlight')
    @include('homepage.section.sale_other')
    @include('homepage.section.sale_open')
    @include('homepage.section.rent_highlight')
    @include('homepage.section.why_chosen')
    @include('homepage.section.partner')
</div>
@endsection
