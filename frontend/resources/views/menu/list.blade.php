<div class="col-md-6 col-sm-6 col-xs-12">
    <!-- Menu header -->
    <div class="x_panel">
        <div class="x_title">
            <h2>Menu trên header</h2>
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
                    <form class="form-horizontal form-label-left" id="menu_header_form">
                        @csrf
                        <table class="table">
                            <tbody id="list1" class="lists">
                            <tr>
                                <td>STT</td>
                                <td>Tên menu</td>
                                <td>Link menu</td>
                                <td>Trạng thái</td>
                                <td>Thao tác</td>
                            </tr>
                            @if ($menu_headers->isNotEmpty())
                                <?php $i = 1; ?>
                                @foreach($menu_headers as $menu)
                                    <tr data-menuId="{{ $menu->id }}">
                                        <td>{{ $i }}</td>
                                        <td>{{ $menu->item_title }}</td>
                                        <td>{{ $menu->item_url }}</td>
                                        <td><?php echo $menu->is_actived == 1 ? '<span class="label label-success">Hiển thị ngoài frontend</span>' : '<span class="label label-danger">Không hiển thị ngoài frontend</span>'; ?></td>
                                        <td>
                                            <a href='{{ url("menu/edit/$menu->id") }}' class="btn btn-xs">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href='{{ url("menu/delete/$menu->id") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa menu {{ $menu->item_title }} này chứ?')">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">Không có bản ghi nào phù hợp.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu footer -->
    <div class="x_panel">
        <div class="x_title">
            <h2>Menu dưới footer</h2>
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
                    <form class="form-horizontal form-label-left" id="menu_footer_form">
                        @csrf
                        <table class="table">
                            <tbody id="list2" class="lists">
                            <tr>
                                <td>STT</td>
                                <td>Tên menu</td>
                                <td>Link menu</td>
                                <td>Vị trí</td>
                                <td>Trạng thái</td>
                                <td>Thao tác</td>
                            </tr>
                            @if ($menu_footers->isNotEmpty())
                                <?php $i = 1; ?>
                                @foreach($menu_footers as $menu)
                                    <tr data-menuId="{{ $menu->id }}">
                                        <td>{{ $i }}</td>
                                        <td>{{ $menu->item_title }}</td>
                                        <td>{{ $menu->item_url }}</td>
                                        <td>
                                            <?php
                                            switch ($menu->position) {
                                                case 'menu_footer_1':
                                                    echo '<span class="badge bg-green">Menu footer cột trái</span>';
                                                    break;
                                                case 'menu_footer_2':
                                                default:
                                                    echo '<span class="badge bg-blue">Menu footer cột phải</span>';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $menu->is_actived == 1 ? '<span class="label label-success">Hiển thị ngoài frontend</span>' : '<span class="label label-danger">Không hiển thị ngoài frontend</span>'; ?></td>
                                        <td>
                                            <a href='{{ url("menu/edit/$menu->id") }}' class="btn btn-xs">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href='{{ url("menu/delete/$menu->id") }}' class="btn btn-xs" onclick="return confirm('Bạn có chắc muốn xóa menu {{ $menu->item_title }} này chứ?')">
                                                <i class="fa fa-trash-o"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" align="center">Không có bản ghi nào phù hợp.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        // Menu header
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
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('menu/order') }}',
                        data: $('#menu_header_form').serialize() + "&menuId=" + $(el).attr('data-menuId')
                            + "&order=" + $(el).index(), // serializes the form's elements
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
                    text: 'Đã sắp xếp lại menu trên header.',
                    type: 'success',
                    styling: 'bootstrap3'
                })
            },
            receive: function (event, ui) {}
        }).disableSelection();
        // Menu footer
        $('#list2').sortable({
            connectWith: '.lists',
            cursor: 'move',
            start: function (event, ui) {
                ui.item.startPos = ui.item.index();
            },
            stop: function (event, ui) {
                console.log('Start position ' + ui.item.startPos);
                console.log('New position ' + ui.item.index());
                $.map($(this).find('tr'), function(el) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('menu/order') }}',
                        data: $('#menu_footer_form').serialize() + "&menuId=" + $(el).attr('data-menuId')
                            + "&order=" + $(el).index(), // serializes the form's elements
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
                    text: 'Đã sắp xếp lại menu dưới footer.',
                    type: 'success',
                    styling: 'bootstrap3'
                })
            },
            receive: function (event, ui) {}
        }).disableSelection();
    });
</script>
