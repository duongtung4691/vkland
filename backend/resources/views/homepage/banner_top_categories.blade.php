<ul class="gallery-slideshow">
    @foreach($dataT as $data)
        <li style="position:relative;height:100%">
            <div class="hero-item" style="background-image: url({{$data['post_image']}})">
                <div class="content-item">
                    <!--<p class="cate-item">
                        CÂU CHUYỆN BÊNH NHÂN
                    </p>-->
                    <h3 class="title-item">
                        <a href="#"> {{$data['post_title']}}</a>
                    </h3>
                    <p class="lead-item">
                        {{ shorten_string($data['post_excerpt'], 40) }}
                    </p>
                    <p class="view-more">
                        <a href="{{$data['post_link']}}" class="link-view-more">
                            Xem thêm
                        </a>
                    </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>





