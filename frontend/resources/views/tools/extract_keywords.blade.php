<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <p><a href="{{ url('/') }}" title="Quay lại">&larr; Quay lại</a></p>
            <form class="form-horizontal form-label-left input_mask" action="{{ url('extract') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Content</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="date-picker form-control col-md-7 col-xs-12" name="content" required="required" rows="10" cols="200"></textarea>
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
            @if (isset($keywords))
                <strong>Danh sách từ khóa suggest:</strong><br/>
                {{ $keywords}}
            @endif
        </div>
    </div>
</div>