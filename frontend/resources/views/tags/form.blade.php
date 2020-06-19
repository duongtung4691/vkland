<!--
* Create by: tiemtt
* Created by: 01/11/2019
* Updated by:
* Note: một vài biến dùng chung cần chú ý check isset()
-->
<?php
switch ($action) {
    case 'show':
        $attribute = 'disabled';
        break;
    default:
        $attribute = '';
        break;
}
$queryString = app('request')->getQueryString();
if(strpos($queryString, '?') == true){
    $queryString .= isset($number_record)?'&nr=' . $number_record:'';
}else{
    $queryString = isset($number_record)?'?nr=' . $number_record:'';
}
?>
@extends('layouts.default')
@section('content')
    <div id="posts_tags_form">
        <div class="page-title">
            <div class="title_left">
                <a href="{{ url('/tags') }}" title="Tạo mới tag" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Tạo mới tag</a>
                @if(isset($arr_val["name"]) && trim($arr_val["name"]) != "")
                    <a href="{{ url('/tags/search?p='.$arr_val["name"]) }}" title="tìm kiếm tag" class="btn btn-primary"><i class="fa fa-search"></i> Quay lại Tìm Kiếm</a>
                @else
                    <a href="{{ url('/tags/search') }}" title="tìm kiếm tag" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm tag</a>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            @include('components.alert')
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ ucfirst($action) }} Tag: {{ $tag->name }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left input_mask" action="{{ url("tags/edit/".$tag->id.$queryString) }}" method="post" accept-charset="UTF-8">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên tag <span
                                            class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" required="required" value="{{ $tag->name }}" {{ $attribute }}>
                                    <input type="hidden" name="h_p" value="{{ $arr_val["name"] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5" {{ $attribute }}>{{ $tag->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta - tiêu đề</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="meta_title" {{ $attribute }} value="{{ $tag->meta_title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta - từ khóa</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="meta_keyword" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5" {{ $attribute }}>{{ $tag->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta - mô tả</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="meta_description" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5" {{ $attribute }}>{{ $tag->meta_description }}</textarea>
                                </div>
                            </div>
                            @if ($action != 'show')
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                        <button class="btn btn-primary" type="reset">Nhập lại</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div id="lst_tags">
                <?php echo isset($html_done)?$html_done:'';?>
            </div>
        </div>
    </div>
@endsection
