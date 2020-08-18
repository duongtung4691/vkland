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
            <?php $sliders->setPath('/templates/bannertop'); ?>
            {{ $sliders->links() }}
            <table class="table">
                <thead>
                <tr>
                    <th>Ảnh slide</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td><img src="{{config()->get('constants.STATIC_IMAGES'). $slider->banner_file}}" width="200px" alt=""/></td>
                        <td>
                            <a href='{{ url("templates/delete/bannertop/$slider->id") }}' class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa banner {{ $slider->banner_name }} này chứ?')">
                                <i class="fa fa-trash-o"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <?php $sliders->setPath('/templates/bannertop'); ?>
            {{ $sliders->links() }}
        </div>
    </div>
</div>