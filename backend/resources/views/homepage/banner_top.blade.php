<div class="slider-hero">
    @foreach($dataT as $data)
    <div class="hero-item" style="background-image: url({{$data['post_image']}})">
        <div class="content-item">
            <h3 class="title-item">
                <a href="{{$data['post_link']}}">{{$data['post_title']}}</a>
            </h3>
            <p class="lead-item">{{ shorten_string($data['post_excerpt'], 40) }}</p>
            <p class="view-more">
                <a href="{{$data['post_link']}}" class="link-view-more">
                    Xem thêm <img src="/v2/images/view-more.svg"/>
                </a>
            </p>
        </div>
    </div>
    @endforeach
</div>
