<?php
$dataTemplate = DB::table('templates')->where('key', 'section_bds')->get();
$dataTemplate = json_decode($dataTemplate[0]->data_template);
?>
@if (!empty($dataTemplate))
<!--Dx Tại Sao Lựa Chọn DX Start-->
<section class="dx_why_choose_bg">
    <div class="container">
        <!--Heading Wrap Start-->
        <div class="dx_heading_1"><h2>Tại sao lựa chọn VIETKAOLAND</h2></div>
        <!--Heading Wrap End-->
        <div class="row">
            @foreach($dataTemplate as $item)
                <div class="col-md-3">
                    <div class="dx-action7_content">
                        <a href="{{$item->post_link}}" title="{{$item->post_title}}">
                            <img src="{{config()->get('constants.STATIC_IMAGES') . $item->post_image}}" alt="{{$item->post_title}}">
                        </a>
                        <h5>{{$item->post_title}}</h5>
                        {{$item->post_excerpt}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--Dx Tại Sao Lựa Chọn DX End-->
@endif
<?php unset($dataTemplate); ?>