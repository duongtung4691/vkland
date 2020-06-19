
<div class="col-md-6 col-sm-6 col-xs-6">
    <div class="x_panel">
        <div class="x_content">
            <table class="table">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Họ và tên</th>
                    <th>Quyền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a href='{{ url("users/show/$user->id") }}' class="btn btn-xs">
                                <i class="fa fa-eye"></i> Show
                            </a>
                            <a href='{{ url("users/edit/$user->id") }}' class="btn btn-xs">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href='{{ url("users/delete/$user->id") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa user {{ $user->name }} này chứ?')">
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