@extends('layouts.default')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Template mẫu</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    @include('components.alert')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tạo mới template</h2>
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
                <form class="form-horizontal form-label-left input_mask" action="{{ url('templates/sectionseo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Key<span
                                class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" value="{{ $template->key }}" name="key" required="required" readonly="readonly" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên template <span
                                    class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="name" required="required" placeholder="Template Cần một lời khuyên cá nhân" value="{{ $template->name }}">
                        </div>
                    </div>
                    @foreach($dataTemplate as $data)
                    <div class="group_post" style="padding-top: 20px; padding-bottom: 20px; border: 2px; border-bottom-color: #0f0f0f">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta title</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="input" class="form-control post_title" value="{{$data['post_title']}}" name="post_title[]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta description</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <textarea class="form-control post_excerpt" name="post_excerpt[]" rows="3">{{$data['post_excerpt']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <img style="width: 100px" class="img_post_image"  src="{{config()->get('constants.STATIC_IMAGES').$data['post_image']}}"/>
                                <input type="input" class="form-control post_image" value="{{$data['post_image']}}" name="post_image[]">
                                <input type="file" name="post_image_file[]" class="post_image_file">
                            </div>
                        </div>
                    </div>
                    @endforeach
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
</div>
@endsection
