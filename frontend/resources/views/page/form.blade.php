<?php
switch ($action) {
    case 'show':
        $attribute = 'disabled';
        break;
    default:
        $attribute = '';
        break;
}
?>
@extends('layouts.default')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3><a href="{{ url('/page') }}" title="Quay về danh sách các trang tĩnh">&larr; Quay về danh sách các trang tĩnh</a></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @include('components.alert')
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ ucfirst($action) }} bài viết {{ $page->title }}</h2>
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
                    <form class="form-horizontal form-label-left input_mask" action="{{ url('page/update/' . $page->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề <span
                                        class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="title" required="required" value="{{ $page->title }}" {{ $attribute }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tóm tắt</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea type="text" class="form-control" name="excerpt" {{ $attribute }} rows="3">{{ $page->excerpt }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nội dung <span
                                        class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" id="content" name="content" data-parsley-trigger="keyup" data-parsley-validation-threshold="10">
                                    {{ $page->content }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Danh mục</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="category_id" {{ $attribute }}>
                                    <option value="0" selected>Không</option>
                                    @if ($action != 'show')
                                        @foreach($categories as $key=>$value)
                                            @if ($category->id != 0)
                                                <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                            @else
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        @if ($category->id != 0)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" class="form-control" name="latitude" value="{{ $page->latitude }}" {{ $attribute }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" class="form-control" name="longitude" value="{{ $page->longitude }}" {{ $attribute }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên người viết <span
                                        class="required">*</span></label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" class="form-control" name="author_name" required="required" value="{{ $page->author_name }}" {{ $attribute }}>
                                <input type="hidden" name="user_id" value="{{(auth()->user()) ? auth()->user()->id : 0}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiêu đề (SEO) <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="meta_title" required="required" value="{{ $page->meta_title }}" {{ $attribute }}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ khóa (SEO) <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" name="meta_keyword" rows="3" required="required" {{ $attribute }}>{{ $page->meta_keyword }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả (SEO) <span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="form-control" name="meta_description" rows="3" required="required" {{ $attribute }}>{{ $page->meta_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện (không bắt buộc)</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="file" class="form-control" name="thumbnail_url">
                                <div id="thumbnail_preview"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trạng thái bài viết</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="publish" name="status"> Đăng bài
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="draft" name="status"> Bản nháp
                                    </label>
                                </div>
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
    </div>
    <style>
        #thumbnail_preview {
            width: 100%;
            height: 0px;
            background: no-repeat;
        }
        .show-placeholder div:first-child{
            display: none
        }
    </style>
    <script>
        $('input[name="thumbnail_url"]').on('change', function () {console.log(this.files);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
                reader.onloadend = function () { // set image data as background of div
                    $('#thumbnail_preview').css({'background-image': 'url("' + this.result + '")', 'height': '300px'});
                }
            }
        });
    </script>
@endsection
