@extends('layouts.default')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3><a href="{{ url('posts/highlight') }}" title="Tất cả viết nổi bật">Tất cả bài viết nổi bật</a>&nbsp;<small>&rArr;&nbsp;Kéo thả bài viết có sẵn vào danh sách bài viết nổi bật</small></h3>
        <select class="form-control" name="category_id">
            <option value="">-- Chọn danh mục bài viết nổi bật --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"{{ $category->id == $category_id ? ' selected' : ''  }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    @include('components.alert')
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel bg-blue-sky">
            <div class="x_title">
                <h2>Danh sách bài viết nổi bật</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" id="highlight_form">
                    @csrf
                    <table class="table">
                        <tbody id="list1" class="lists">
                        <tr>
                            <td>ID</td>
                            <td>Tiêu đề</td>
                            <td>Danh mục</td>
                            <td>Loại bài viết</td>
                            <td>Tác giả</td>
                            <td>Trạng thái bài viết</td>
                            <td></td>
                        </tr>
                        @foreach($highlightPosts as $post)
                            <tr data-postId="{{ $post->id }}" data-categoryId="{{ $post->category_id }}">
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $post->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <?php
                                    switch ($post->post_type) {
                                    case 'text':
                                    ?>
                                    <span class="glyphicon glyphicon-text-size" aria-hidden="true" style="font-size:10px !important;"></span>&nbsp;Bài text
                                    <?php break;
                                    case 'photo':
                                    ?>
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true" style="font-size:10px !important;"></span>&nbsp;Bài ảnh
                                    <?php break;
                                    case 'video':
                                    ?>
                                    <span class="glyphicon glyphicon-facetime-video" aria-hidden="true" style="font-size:10px !important;"></span>&nbsp;Bài video
                                    <?php break;
                                    default:
                                        break;
                                    }
                                    ?>
                                </td>
                                <td>{{ $post->author_name }}</td>
                                <td>
                                    <?php
                                    switch ($post->status) {
                                    case 'trash':
                                    ?>
                                    <span class="label label-default">Bài bị xóa</span>
                                    <?php break;
                                    case 'draft':
                                    ?>
                                    <span class="label label-primary">Bài nháp</span>
                                    <?php break;
                                    case 'publish':
                                    ?>
                                    <span class="label label-success">Bài đăng</span>
                                    <?php break;
                                    default:
                                        break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href='{{ config()->get('constants.FRONTEND_URL') . $post->share_url }}' class="btn btn-xs" target="_blank">
                                        <i class="fa fa-eye"></i> Preview
                                    </a>
                                    <a href='{{ url("category/$category_id/posts/edit/$post->id") }}' class="btn btn-xs">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href='{{ url("category/$category_id/posts/delete/$post->id") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa bài viết {{ $post->title }} này chứ?')">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    @include('posts.list')
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $('select[name="category_id"]').change(function () {
            window.location.href = '/posts/highlight/' + $(this).val();
        });
        $('#list1').sortable({
            connectWith: '.lists',
            cursor: 'move',
            start: function (event, ui) {
                ui.item.startPos = ui.item.index();
            },
            stop: function (event, ui) {
                console.log('Start position ' + ui.item.startPos);
                console.log('New position ' + ui.item.index());
                $.map($(this).find('tr'), function(el) {
                    console.log($(el).attr('data-postId') + ' = ' + $(el).index());
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('posts/orderHighlight') }}',
                        data: $('#highlight_form').serialize() + "&postId=" + $(el).attr('data-postId')
                            + "&order=" + $(el).index() + "&categoryId=" + $(el).attr('data-categoryId'), // serializes the form's elements
                        success: function (result, status, xhr) {
                            result = JSON.parse(result);
                        },
                        error: function (xhr, status, error) {
                            console.log(status + '; ' + error);
                        }
                    });
                });
                new PNotify({
                    title: 'Thông báo',
                    text: 'Đã sắp xếp lại bài viết nổi bật.',
                    type: 'success',
                    styling: 'bootstrap3'
                })
            },
            receive: function (event, ui) {
                console.log($(ui.item).attr('data-postId'));
                $.ajax({
                    type: 'POST',
                    url: '{{ url('posts/addHighlight') }}',
                    data: $('#highlight_form').serialize() + "&postId=" + $(ui.item).attr('data-postId') + "&categoryId=" + $(ui.item).attr('data-categoryId'), // serializes the form's elements
                    success: function (result, status, xhr) {
                        result = JSON.parse(result);
                        new PNotify({
                            title: 'Thông báo',
                            text: 'Thêm bài viết nổi bật thành công.',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    },
                    error: function (xhr, status, error) {
                        console.log(status + '; ' + error);
                    }
                });
            }
        }).disableSelection();
        $('#list2').sortable({
            connectWith: '.lists',
            cursor: 'move',
            receive: function (event, ui) {
                $.ajax({
                    type: 'POST',
                    url: '{{ url('posts/removeHighlight') }}',
                    data: $('#highlight_form').serialize() + "&postId=" + $(ui.item).attr('data-postId') + "&categoryId=" + $(ui.item).attr('data-categoryId'), // serializes the form's elements
                    success: function (result, status, xhr) {
                        result = JSON.parse(result);
                        new PNotify({
                            title: 'Thông báo',
                            text: 'Đã bỏ bài viết nổi bật.',
                            styling: 'bootstrap3'
                        })
                    },
                    error: function (xhr, status, error) {
                        console.log(status + '; ' + error);
                    }
                });
            }
        }).disableSelection();
    });
</script>
@endsection
