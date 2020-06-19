<!--
* Create by: tiemtt
* Created by: 01/11/2019
* Updated by:
* Note:
-->
@extends('layouts.default')
@section('content')
    <div id="posts_tags_index">
        <div class="page-title">
            <div class="title_left">
                <a href="{{ url('/tags/search') }}" title="tìm kiếm tag" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm tag</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            @include('components.alert')
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tạo mới tag</h2>
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
                        <form class="form-horizontal form-label-left input_mask" action="{{ url('tags/store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta - tiêu đề</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="meta_title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta - từ khóa</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="meta_keyword" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta - mô tả</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="meta_description" data-parsley-trigger="keyup" data-parsley-validation-threshold="10" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    <button class="btn btn-primary" type="reset">Nhập lại</button>
                                </div>
                            </div>
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
