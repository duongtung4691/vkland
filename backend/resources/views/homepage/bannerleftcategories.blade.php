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
                <form class="form-horizontal form-label-left input_mask" action="{{ url('category-banner/bannerleft') }}" method="post" enctype="multipart/form-data">
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bài viết<span
                                    class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="post_id form-control" style="width:500px;" name="post_id[]">
                                    <option value="0">Chon sản phẩm</option>
                                    @if(count($dataP) > 0)
                                        @foreach($dataP as $p)
                                            <option value="{{ $p['id'] }}" <?php echo ($data['post_id'] == $p['id']) ? 'selected="selected"' : '' ?>>{{ $p['name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <button type="button" class="btn btn-success reset_post">Cập nhật bài viết</button>
                                <button type="button" class="delete_post btn-danger btn" style="float: right">Xóa</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <img style="width: 100px" class="img_post_image"  src="{{$data['post_image']}}"/>
                                <input type="input" class="form-control post_image" value="{{$data['post_image']}}" name="post_image[]">
                                <input type="file" name="post_image_file[]" class="post_image_file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="input" class="form-control post_title" value="{{$data['post_title']}}" name="post_title[]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="input" class="form-control post_price" value="{{$data['post_price']}}" name="post_price[]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá khuyến mại</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="input" class="form-control post_saleprice" value="{{$data['post_saleprice']}}" name="post_saleprice[]">
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
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển thị</label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <select class="form-control" name="post_display[]">
                                    <option value="0" {{ ((isset($data['post_display']) && $data['post_display'] == 0)?'selected':'') }}>Không</option>
                                    <option value="1" {{ ((isset($data['post_display']) && $data['post_display'] == 1)?'selected':'') }}>Có</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
            $.ajax({
                type: 'get',
                url: '/templates/getproducts',
                success: function (response) {
                    var htmlPost = '';
                    var optionP = '';
                    $.each( response, function( key, value ) {
                        optionP += '<option value="' + value.id  +  '">' + value.name + '</option>';
                    });

                    htmlPost += '<div class="group_post" style="padding-top: 20px; padding-bottom: 20px; border: 2px; border-bottom-color: #0f0f0f">';
                    htmlPost += '<div class="form-group">\n' +
                        '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bài viết<span\n' +
                        '                                    class="required">*</span></label>\n' +
                        '                            <div class="col-md-9 col-sm-9 col-xs-12">\n' +
                        '                                <select class="post_id form-control" style="width:500px;" name="post_id[]">\n' +
                        '                                    <option value="0">Chon sản phẩm</option>';
                    htmlPost += optionP;
                    htmlPost +=  ' </select>' +
                        '                           <button type="button" class="btn btn-success reset_post">Cập nhật bài viết</button>' +
                        '                           <button type="button" class="delete_post btn-danger btn" style="float: right">Xóa</button>\n' +
                        '                            </div>\n' +
                        '                        </div>';
                    htmlPost += '<div class="form-group">\n' +
                        '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>\n' +
                        '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                        '                               <img class="img_post_image" style="width: 100px"  src=""/>' +
                        '                               <input type="input" class="form-control post_image" value="" name="post_image[]">' +
                        '                               <input type="file" name="post_image_file[]" class="post_image_file">\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm</label>\n' +
                        '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                        '                                <input type="input" class="form-control post_title" value="" name="post_title[]">\n' +
                        '                            </div>\n' +
                        '                        </div>\n';
                    htmlPost += '<div class="form-group">\n' +
                        '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá</label>\n' +
                        '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                        '                                <input type="input" class="form-control post_price" value="" name="post_price[]">\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá khuyến mại</label>\n' +
                        '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                        '                                <input type="input" class="form-control post_saleprice" value="" name="post_saleprice[]">\n' +
                        '                            </div>\n' +
                        '                        </div>';
                    htmlPost += '<div class="form-group">\n' +
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
                    htmlPost += '<div class="form-group">\n' +
                        '                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hiển thị</label>\n' +
                        '                            <div class="col-md-5 col-sm-5 col-xs-12">\n' +
                        '                                 <select class="form-control" name="post_display[]">\n' +
                        '                                    <option value="0" selected>Không</option>\n' +
                        '                                    <option value="1">Có</option>\n' +
                        '                                </select>\n' +
                        '                            </div>\n' +
                        '                        </div>';
                    htmlPost +=  '</div>';
                    $('.group_post').last().after(htmlPost);

                }
            });
        })

        $(document).on("click",".delete_post",function() {
            var that = $(this);
            if($('.group_post').length > 1) {
                that.parents('.group_post').remove();
            }
        });

        $(document).on("click",".reset_post",function() {
            var groupP = $(this).parents('.group_post');
            var pId = groupP.find('.post_id').val();
            $.ajax({
                type: 'get',
                url: '/templates/getproduct',
                data: {
                    id:pId
                },
                success: function (response) {
                    groupP.find('.post_link').val(response.share_url);
                    groupP.find('.post_image').val(response.image);
                    groupP.find('.img_post_image').attr("src", response.image);
                    groupP.find('.post_title').val(response.name);
                    groupP.find('.post_excerpt').val(response.description);
                    groupP.find('.post_price').val(response.price);
                    groupP.find('.post_saleprice').val(response.saleprice);
                }
            });
        });

        $(document).on("change",".post_id",function() {
            var groupP = $(this).parents('.group_post');
            var pId = $(this).val();
            $.ajax({
                type: 'get',
                url: '/templates/getproduct',
                data: {
                    id:pId
                },
                success: function (response) {
                    groupP.find('.post_link').val(response.share_url);
                    groupP.find('.post_image').val(response.image);
                    groupP.find('.img_post_image').attr("src", response.image);
                    groupP.find('.post_title').val(response.name);
                    groupP.find('.post_excerpt').val(response.description);
                    groupP.find('.post_price').val(response.price);
                    groupP.find('.post_saleprice').val(response.saleprice);
                }
            });
        });
    })
</script>
@endsection
