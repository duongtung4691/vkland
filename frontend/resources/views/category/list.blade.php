<div class="col-md-6 col-sm-6 col-xs-6">
    <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Parent ID</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>@if ($category->parent_id > 0) &nbsp;&nbsp;&nbsp;&nbsp;|-- @endif{{ $category->name }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>
                                <a href='{{ url("category/show/$category->id") }}' class="btn btn-xs">
                                    <i class="fa fa-eye"></i> Show
                                </a>
                                <a href='{{ url("category/edit/$category->id") }}' class="btn btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href='{{ url("category/delete/$category->id") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa danh mục bài viết {{ $category->name }} này chứ?')">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>