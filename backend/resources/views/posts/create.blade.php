@extends('layouts.default')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3><a href="{{ url('/posts') }}" title="Quay về danh sách các bài viết">&larr; Quay về danh sách các bài viết danh mục</a></h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    @include('components.alert')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm mới bài viết dạng {{ $type }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" action="{{ url('/posts/store/'. $type) }}" method="post" id="postForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề <span
                                    class="required">*</span></label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control" name="title" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tóm tắt</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea id="excerpt" class="form-control" name="excerpt" rows="3"></textarea>
                            <label class="label label-info word-left">Còn thêm được <strong>{{ config()->get('constants.LIMIT_WORD_COUNT_EXCERPT') }}</strong> từ nữa</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung <span
                                    class="required">*</span></label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea id="content" class="editor form-control" name="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Danh mục</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        @if ($category->parent_id > 0) &nbsp;&nbsp;&nbsp;&nbsp;
                                            |--
                                        @endif
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Loại dự án</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="radio">
                                <input type="radio" value="sale_highlight" name="category_type" class="flat"> Dự án nổi bật
                            </div>
                            <div class="radio">
                                <input type="radio" value="sale_other" name="category_type" class="flat"> Dự án bất động sản khác
                            </div>
                            <div class="radio">
                                <input type="radio" value="sale_open" name="category_type" class="flat"> Dự án sắp mở bán
                            </div>
                            <div class="radio">
                                <input type="radio" value="rent_highlight" name="category_type" class="flat"> Dự án cho thuê nổi bật
                            </div>
                            <div class="radio">
                                <input type="radio" value="sale_inprogress" name="category_type" class="flat"> Dự án đang bán
                            </div>
                            <div class="radio">
                                <input type="radio" value="sale_best" name="category_type" class="flat"> Dự án bạn chạy
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Giá bán (Giá cho thuê)</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Địa chỉ</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Phường/Xã</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" name="subdistrict">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Quận/Huyện</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" name="district">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tỉnh/Thành phố</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" name="province">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên người viết <span
                                    class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" name="author_name" required="required" value="{{ auth()->user()->name ?? '' }}">
                            <input type="hidden" name="user_id" value="{{(auth()->user()) ? auth()->user()->id : 0}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Ảnh đại diện ({{ config()->get('constants.LABEL_SIZE_THUMBNAIL') }})</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="file" class="form-control" name="thumbnail_url">
                            <div id="thumbnail_preview" class="mt-4"></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tags (keywords bài viết)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="tags" type="text" class="tags form-control" name="tags"/>
                            <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề (SEO) <span
                                    class="required">*</span></label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" class="form-control" name="meta_title" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Từ khóa (SEO) <span
                                    class="required">*</span></label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea class="form-control" name="meta_keyword" rows="3" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Mô tả (SEO) <span
                                class="required">*</span></label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <textarea class="form-control" name="meta_description" rows="3" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Trạng thái bài viết</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="radio">
                                <input type="radio" checked="checked" value="draft" name="status" class="flat"> Bài nháp
                            </div>
                            @hasanyrole(config()->get('constants.GROUP_PUBLISH_CONTENT'))
                            <div class="radio">
                                <input type="radio" value="publish" name="status" class="flat"> Cho đăng
                            </div>
                            @endhasrole
                        </div>
                    </div>
                    <div class="row calendar-exibit">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thời gian đăng</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class='input-group date myDatepicker'>
                                <input type='text' class="form-control" name="published_at" data-date-format="{{ config()->get('constants.DATA_DATE_FORMAT') }}"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="submit">Lưu bài</button>
                            <button class="btn btn-light" type="reset">Nhập lại</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('components.thumbnail_preview')
@include('components.save_posts')
@include('components.tags')
@endsection
