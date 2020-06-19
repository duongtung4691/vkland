@if(isset($tags) && count($tags) > 0)
<table class="number_record_on_page">
    <tr>
        <td>
            <?php
            $append_page = [];
            if(isset($arr_val["name"]) && $arr_val["name"] != ""){
                $append_page['p'] = $arr_val["name"];
            }
            if(isset($number_record) && $number_record != ""){
                $append_page['nr'] = $number_record;
            }
            $tags->setPath('/tags');
            ?>
            {{ count($append_page) > 0?$tags->appends($append_page)->links():$tags->links() }}
        </td>
        <td>
            <ul class="pagination">
                <li>
                    <select class="form-control" name="number_record_on_page" id="number_record_on_page">
                        <option value="5" {{isset($number_record) && $number_record == '5'?'selected':''}}>5</option>
                        <option value="10" {{isset($number_record) && $number_record == '10'?'selected':''}}>10</option>
                        <option value="20" {{isset($number_record) && $number_record == '20'?'selected':''}}>20</option>
                        <option value="50" {{isset($number_record) && $number_record == '50'?'selected':''}}>50</option>
                        <option value="100" {{isset($number_record) && $number_record == '100'?'selected':''}}>100</option>
                        <option value="all" {{isset($number_record) && $number_record == 'all'?'selected':''}}>Tất cả</option>
                    </select>
                </li>
            </ul>
        </td>
        <td>
            <span class="lbl_number_record">(Số bản ghi trên mỗi trang)</span>
        </td>
    </tr>
</table>
<table class="table">
    <thead>
    <tr>
        <th>
            #
        </th>
        <th>Tên tag</th>
        <th>Chỉnh sửa lần cuối vào lúc</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tags as $val)
        <?php $i++; ?>
        <tr>
            <td>
                {{$i}}
            </td>
            <td>
                <a href='{{ url("tags/edit/$val->id$queryString") }}' id="a_tag_name{{$i}}" class="btn btn-xs">
                    {{ $val->name }}
                </a>
            </td>
            <td>
                {{ date('H:i A', strtotime($val->updated_at)) . ' ngày ' . date('d/m/Y', strtotime($val->updated_at)) }}
            </td>
            <td>
                <a href='{{ url("tags/show/$val->id$queryString") }}' class="btn btn-xs">
                    <i class="fa fa-eye"></i> Show
                </a>
                <a href='{{ url("tags/edit/$val->id$queryString") }}' class="btn btn-xs">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a href='{{ url("tags/delete/$val->id$queryString") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa tag {{ $val->name }} này chứ?')">
                    <i class="fa fa-trash-o"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="number_record_on_page">
    <tr>
        <td>
            <?php
            $append_page = [];
            if(isset($arr_val["name"]) && $arr_val["name"] != ""){
                $append_page['p'] = $arr_val["name"];
            }
            if(isset($number_record) && $number_record != ""){
                $append_page['nr'] = $number_record;
            }
            $tags->setPath('/tags');
            ?>
            {{ count($append_page) > 0?$tags->appends($append_page)->links():$tags->links() }}
        </td>
        <td>
            <ul class="pagination">
                <li>
                    <select class="form-control" name="number_record_on_page" id="number_record_on_page">
                        <option value="5" {{isset($number_record) && $number_record == '5'?'selected':''}}>5</option>
                        <option value="10" {{isset($number_record) && $number_record == '10'?'selected':''}}>10</option>
                        <option value="20" {{isset($number_record) && $number_record == '20'?'selected':''}}>20</option>
                        <option value="50" {{isset($number_record) && $number_record == '50'?'selected':''}}>50</option>
                        <option value="100" {{isset($number_record) && $number_record == '100'?'selected':''}}>100</option>
                        <option value="all" {{isset($number_record) && $number_record == 'all'?'selected':''}}>Tất cả</option>
                    </select>
                </li>
            </ul>
        </td>
        <td>
            <span class="lbl_number_record">(Số bản ghi trên mỗi trang)</span>
        </td>
    </tr>
</table>
@else
    Không tìm thấy Tags
@endif
