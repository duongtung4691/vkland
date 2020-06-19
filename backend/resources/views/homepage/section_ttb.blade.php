<div class="slider-drug-cate slider-center-dot">
<?php
$total = count($dataT);
for ($i = 0; $i < $total; $i = $i + 4) {
?>
<div class="item-drug-cate">
    <div class="half-drug-cate">
        @if (isset($dataT[$i]))
            <a href="{{$dataT[$i]['post_link']}}" class="big-drug-cate timmach-bg">
                <div class="cta-drug-cate">
                    <span>{{$dataT[$i]['post_title']}}</span>
                </div>
            </a>
        @endif
        @if (isset($dataT[$i + 1]))
            <a href="{{$dataT[$i + 1]['post_link']}}" class="small-drug-cate tieuhoa-bg">
                <div class="cta-drug-cate">
                    <span>{{$dataT[$i + 1]['post_title']}}</span>
                </div>
            </a>
        @endif
    </div>
    <div class="half-drug-cate revert">
        @if (isset($dataT[$i + 2]))
            <a href="{{$dataT[$i + 2]['post_link']}}" class="big-drug-cate xuong-bg">
                <div class="cta-drug-cate">
                    <span>{{$dataT[$i + 2]['post_title']}}</span>
                </div>
            </a>
        @endif
            @if (isset($dataT[$i + 3]))
                <a href="{{$dataT[$i + 3]['post_link']}}" class="small-drug-cate rang-bg">
                    <div class="cta-drug-cate">
                        <span>{{$dataT[$i + 3]['post_title']}}</span>
                    </div>
                </a>
            @endif
    </div>
</div>
<?php
}
?>
</div>
