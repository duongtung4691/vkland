<div class="flex-item">
    <?php
    if (isset($dataT[0])) {
        $data = $dataT[0];
    ?>
    <div class="item-right-hero" style="background-image: url('v2/images/example/right-hero@3x.jpg')">
        <div class="product-info">
            <div class="inner-product-info">
                <h4 class="title-product">{{$data['post_title']}}</h4>
                <p class="lead-product">
                    <a href="{{$data['post_link']}}-{{$data['post_id']}}.html">{{ shorten_string($data['post_excerpt'], 40) }}</a>
                </p>
                <p class="price-product">{{number_format((int)$data['post_saleprice'])}}đ</p>
                <p class="cta-product">
                    <a href="{{$data['post_link']}}-{{$data['post_id']}}.html" class="btn btn-default">Chi tiết</a>
                </p>
            </div>
        </div>
        <div class="product-img">
            <a href="{{$data['post_link']}}-{{$data['post_id']}}.html">
                <img src="{{$data['post_image']}}"/>
            </a>
        </div>
    </div>
    <?php } ?>
    <?php
    if (isset($dataT[1])) {
    $data = $dataT[1];
    ?>
    <div class="item-right-hero item-dark-style" style="background-image: url('v2/images/example/right-hero1.png')">
        <div class="product-info">
            <div class="inner-product-info">
                <h4 class="title-product">{{$data['post_title']}}</h4>
                <p class="lead-product">
                    <a href="{{$data['post_link']}}-{{$data['post_id']}}.html">{{ shorten_string($data['post_excerpt'], 40) }}</a>
                </p>
                <p class="price-product">{{number_format((int)$data['post_saleprice'])}}<span>đ</span></p>
                <p class="cta-product">
                    <a href="{{$data['post_link']}}-{{$data['post_id']}}.html" class="btn btn-default">Chi tiết</a>
                </p>
            </div>
        </div>
        <div class="product-img">
            <a href="{{$data['post_link']}}-{{$data['post_id']}}.html">
                <img src="{{$data['post_image']}}"/>
            </a>
        </div>
    </div>
    <?php } ?>
</div>


