<?php
$sliders = DB::table('sliders')->select('banner_name', 'banner_file', 'banner_link')->get();
?>
<!-- Slider Top -->
<!--DX Banner Start-->
@if (!empty((array)$sliders))
    <div class="dx_banner_wrap">
        <ul class="banner_bxslider">
            @foreach($sliders as $slider)
                <li><a href="{{$slider->banner_link}}" target="_blank"><img src="{{config()->get('constants.STATIC_IMAGES') . $slider->banner_file}}" alt="{{$slider->banner_name}}"></a></li>
            @endforeach
        </ul>
    </div>
@endif
<!--DX Banner End-->
<!-- END Slider Top -->