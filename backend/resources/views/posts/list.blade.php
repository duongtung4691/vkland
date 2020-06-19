<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách bài viết có sẵn</h2>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    if ($category_id == '')
                        $posts->setPath('/posts/highlight');
                    else
                        $posts->setPath('/posts/highlight/' . $category_id);
                    ?>
                    {{ $posts->links() }}
                    <table class="table">
                        <tbody id="list2" class="lists">
                        <tr>
                            <td>ID</td>
                            <td>Tiêu đề</td>
                            <td>Danh mục</td>
                            <td>Loại bài viết</td>
                            <td>Tác giả</td>
                            <td>Trạng thái bài viết</td>
                            <td></td>
                        </tr>
                        @foreach($posts as $post)
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
                    <?php
                    if ($category_id == '')
                        $posts->setPath('/posts/highlight');
                    else
                        $posts->setPath('/posts/highlight/' . $category_id);
                    ?>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
