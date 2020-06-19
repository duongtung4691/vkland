<?php $seq = 0;?>
@foreach($dataT as $data)
    <?php
        if($seq == 0){
            $bgr_img = '../images/templates/right-hero@3x.jpg';
        }else{
            $bgr_img = '../images/templates/right-hero1.png';
        }
    ?>
    <div class="item-right-hero" style="background-image: url({{$bgr_img}})">
        <div class="product-info">
            <div class="inner-product-info">
                <h4 class="title-product">{{$data['post_title']}}</h4>
                <p class="lead-product">{{ shorten_string($data['post_excerpt'], 40) }}</p>
                <p class="price-product">
                    {{$data['post_saleprice']}}<u>đ</u>
                </p>
                <p class="cta-product">
                    <a href="../{{$data['post_link']}}-{{$data['post_id']}}.html" class="btn btn-default">Mua ngay</a>
                </p>
            </div>
        </div>
        <div class="product-img">
            <img src="{{url($data['post_image'])}}"/>
        </div>
    </div>
    <?php $seq++;?>
@endforeach

