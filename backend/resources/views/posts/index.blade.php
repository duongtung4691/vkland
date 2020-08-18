@extends('layouts.default')
@section('content')
<div class="row">
    @include('components.alert')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm mới bài viết danh mục</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 form-group">
                        <a href="{{ url('/posts/create/text') }}" class="btn btn-app">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span class="glyphicon-class">Bài viết</span> (text + ảnh + video)
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Tìm kiếm</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" action="{{ url('/posts/search') }}" method="GET">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Tiêu đề <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="title" name="title" class="form-control col-md-7 col-xs-12" required="required" value="{{ $dataSearch['title'] ?? '' }}" placeholder="Bán BĐS">
                        </div>
                        <input type="hidden" name="category_id" value="{{ $dataSearch['category_id'] ?? '' }}"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">Tác giả
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="author" name="author" class="form-control col-md-7 col-xs-12" value="{{ $dataSearch['author'] ?? '' }}" placeholder="vneconomy.vn">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="reset">Nhập lại</button>
                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if (!isset($isElasticsearchData))
                            <?php $posts->setPath('posts'); ?>
                            {{ $posts->links() }}
                        @endif
                        <p class="text-muted">Tổng số bài viết được đăng: {{ $countPublishPosts ?? '' }} bài</p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Loại bài viết</th>
                                <th>Tác giả</th>
                                <th>Trạng thái bài viết</th>
                                <th>Lần chỉnh sửa cuối vào lúc</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <?php
                                if (isset($isElasticsearchData)) $post = $post->_source;
                                $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @foreach ($categories as $category)
                                            @if ($category->id == $post->category_id)
                                                {{ $category->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if (!isset($isElasticsearchData))
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
                                        @endif
                                    </td>
                                    <td>
                                        @if (!isset($isElasticsearchData))
                                            {{ $post->author_name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (!isset($isElasticsearchData))
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
                                            case 'unpublish':
                                                ?>
                                                <span class="label label-warning">Bài bị hạ</span>
                                                <?php break;
                                            case 'publish':
                                                ?>
                                                <span class="label label-success">Bài đăng</span>
                                                <?php break;
                                            default:
                                                break;
                                        }
                                        ?>
                                        @endif
                                    </td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>
                                        <a href='{{ config()->get('constants.FRONTEND_URL') . $post->share_url }}' class="btn btn-info btn-xs" target="_blank">
                                            <i class="fa fa-eye"></i> Preview
                                        </a>
                                        <a href='{{ url("/posts/edit/$post->id") }}' class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href='{{ url("/posts/delete/$post->id") }}' class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa bài viết {{ $post->title }} này chứ?')">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if (!isset($isElasticsearchData))
                            <?php $posts->setPath('posts'); ?>
                            {{ $posts->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .btn-app {
        display: block;
        height: 100px !important;
    }
    .glyphicon {
        font-size:30px !important;
        margin-bottom:10px
    }
    .glyphicon-class {
        font-size:20px
    }
</style>
@endsection
