<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <p><a href="{{ url('/') }}" title="Quay lại">&larr; Quay lại</a></p>
            <form class="form-horizontal form-label-left input_mask" action="{{ url('tools/mapdraw') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên địa chỉ</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" name="name" value="{{ request()->get('name') }}" style="width:500px">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude (Kinh độ)</label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" class="form-control" name="longitude" value="{{ request()->get('longitude') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude (Vĩ độ)</label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" class="form-control" name="latitude" value="{{ request()->get('latitude') }}">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
            @if (isset($latitude) && isset($longitude))
                <div style="float:left;width:48%;margin-right:2%">
                    <p><strong>Bản đồ loại 1 (cần có kinh độ, vĩ độ)</strong></p>
                    <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=vi&z=14&output=embed"></iframe>
                </div>
            @endif
            @if (isset($name))
                <div style="float:right;width:48%;margin-left:2%">
                    <p><strong>Bản đồ loại 2 (chỉ cần địa chỉ)</strong></p>
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{ urlencode($name) }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
                </div>
            @endif
        </div>
    </div>
</div>
