<?php
/**
 * Create by: tiemtt
 * Created by: 01/11/2019
 * Updated by:
 * Note:
    for array appends the links of page
    $params = array('p' => $keysearch, 'a' => $val);
    Pass that to view, and in the view:
    $objs->appends($params)->links()
 */
$queryString = app('request')->getQueryString();
if(strpos($queryString, '?') == true){
    $queryString .= isset($number_record)?'&nr=' . $number_record:'';
}else{
    $queryString = isset($number_record)?'?nr=' . $number_record:'';
}
?>
<div id="posts_tags_list">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="tags_message">
                    @include('tags.item')
                </div>
            </div>
        </div>
    </div>
</div>
