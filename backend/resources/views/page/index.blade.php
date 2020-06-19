@extends('layouts.default')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Các trang tĩnh</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @include('components.alert')
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{ url('page/create') }}" title="Tạo mới bài viết" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Tạo mới bài viết tĩnh</a>
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
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->author_name }}</td>
                                    <td>{{ date('d/m/Y H:i:s A', strtotime($page->created_at)) }}</td>
                                    <td>
                                        <a href='{{ url("page/show/$page->id") }}' class="btn btn-xs">
                                            <i class="fa fa-eye"></i> Show
                                        </a>
                                        <a href='{{ url("page/edit/$page->id") }}' class="btn btn-xs">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href='{{ url("page/delete/$page->id") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa bài viết {{ $page->title }} này chứ?')">
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
    </div>
@endsection