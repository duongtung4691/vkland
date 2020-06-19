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
                <form class="form-horizontal form-label-left input_mask" action="{{ url('templates/sectionbds') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Key<span
                                class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" value="{{ $template->key ?? '' }}" name="key" required="required" readonly="readonly" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên template <span
                                    class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="name" required="required" placeholder="TẠI SAO LỰA CHỌN" value="{{ $template->name ?? '' }}">
                        </div>
                    </div>
                    @isset($dataTemplate)
                        @foreach($dataTemplate as $data)
                        <div class="group_post">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện {{ config()->get('constants.LABEL_SIZE_THUMBNAIL_5NN') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img style="width: 100px" class="img_post_image"  src="{{$data['post_image']}}"/>
                                    <input type="input" class="form-control post_image" value="{{$data['post_image']}}" name="post_image[]">
                                    <input type="file" name="post_image_file[]" class="post_image_file">
                                    <button type="button" class="delete_post btn-danger btn" style="float: right">Xóa</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="input" class="form-control post_title" value="{{$data['post_title']}}" name="post_title[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <textarea class="form-control post_excerpt" name="post_excerpt[]" rows="3">{{$data['post_excerpt']}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="input" class="form-control post_link" value="{{$data['post_link']}}" name="post_link[]">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <div class="form-group" style="float: right">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <button id="new_post" type="button" class="btn btn-success">Thêm mới</button>
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
</div>
<script>
    $( document ).ready(function() {
        $('#new_post').click(function () {
            var htmlPost = '<div class="group_post" style="padding-top: 20px; padding-bottom: 20px; border: 2px; border-bottom-color: #0f0f0f">';
            htmlPost += '<div class="form-group">\n' +
                '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>\n' +
                '                            <div class="col-md-9 col-sm-9 col-xs-12">\n' +
                '                               <img style="width: 100px" class="img_post_image" src=""/>' +
                '                               <input type="input" class="form-control post_image" value="" name="post_image[]">' +
                '                               <input class="post_image_file" type="file" name="post_image_file[]">\n' +
                '                               <button type="button" class="delete_post btn-danger btn" style="float: right">Xóa</button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề</label>\n' +
                '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                '                                <input type="input" class="form-control post_title" value="" name="post_title[]">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="form-group">\n' +
                '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung</label>\n' +
                '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                '                                <textarea class="form-control post_excerpt" name="post_excerpt[]" rows="3"></textarea>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                       <div class="form-group">\n' +
                '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>\n' +
                '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                '                                <input type="input" class="form-control post_link" value="" name="post_link[]">\n' +
                '                            </div>\n' +
                '                        </div>';
            htmlPost +=  '</div>';
            $('.group_post').last().after(htmlPost);
        });

        $(document).on("click",".delete_post",function() {
            var that = $(this);
            if($('.group_post').length > 1) {
                that.parents('.group_post').remove();
            }
        });
    })
</script>
@endsection
