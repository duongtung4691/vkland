<ul class="ul sider-pathology slider-center-dot">
    @foreach($dataT as $data)
    <li class="item-slider">
        <div class="item-inner">
            <a href="{{$data['post_link']}}" class="item-img" style="background-image: url('{{$data['post_image']}}')"></a>
            <div class="ct-item">
                <h3 class="title-item">
                    <a href="{{$data['post_link']}}">{{$data['post_title']}}</a>
                </h3>
                <p class="lead">{{ shorten_string($data['post_excerpt'], 40) }}</p>
                <p class="view-more">
                    <a href="{{$data['post_link']}}" class="link-view-more">
                        Xem chi tiết
                    </a>
                </p>
            </div>
            <div class="share-social">
                <a href="https://www.facebook.com/sharer.php?u={{ config()->get('constants.FRONTEND_URL') . $data['post_link'] }}" target="_blank" rel="nofollow"
                onclick="return !window.open(this.href, 'Facebook', 'width=600,height=500')" title="Chia sẻ bài viết qua Facebook">
                    <img src="v2/images/fb-gray.svg" alt="Chia sẻ bài viết qua Facebook"/>
                    &nbsp;Chia sẻ
                </a>
            </div>
        </div>
    </li>
    @endforeach
</ul>
