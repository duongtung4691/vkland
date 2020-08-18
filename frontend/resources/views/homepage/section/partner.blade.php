<?php
$dataTemplate = DB::table('templates')->where('key', 'section_partner')->get();
$dataTemplate = json_decode($dataTemplate[0]->data_template);
?>
@if (!empty($dataTemplate))
<!--Dx Đối Tác Ngân Hàng Start-->
<section class="dx_partner_bg">
    <!--Heading Wrap Start-->
    <div class="dx_heading_1"><h2>ĐỐI TÁC CỦA VIETKAOLAND</h2>
        <p>Chúng tôi hợp tác với những đối tác hàng đầu trong lĩnh vực đầu tư bất động sản, tài chính, thiết kế nội thất...
            <br>nhằm cung cấp cho gia đình bạn giải pháp mua và thuê đồng bộ và hiệu quả</p>
    </div>
    <!--Heading Wrap End-->
    <div class="kf_property_compnay_bg">
        <div class="container">
            <div class="kf_company_slider owl-carousel owl-theme">
                @foreach($dataTemplate as $item)
                    <div class="item">
                        <div class="kf_compnay_wrap">
                            <a href="{{$item->post_link}}" title="{{$item->post_title}}">
                                <img width="200px" height="113px" src="{{config()->get('constants.STATIC_IMAGES') . $item->post_image}}" alt="{{$item->post_title}}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--Dx Đối Tác Ngân Hàng End-->
@endif
<?php unset($dataTemplate); ?>