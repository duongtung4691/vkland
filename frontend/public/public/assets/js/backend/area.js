var areaJs = {

};
$(document).ready(function() {
    $('#typeArea').change(function() {
        if ($(this).val() == 1) {
            var html = '<div class="col-xs-12 col-sm-6 no-padding" id="region">';
            html += '<label for="name" class="col-xs-12 col-sm-3 control-label text-left">Thuộc miền</label>';
            html += '<div class="col-xs-12 col-sm-9 no-padding">';
            html += '<select name="region" class="form-control">';
            html += '<option value="0" selected="selected">Chọn miền</option>';
            html += '<option value="1">Miền Bắc</option>';
            html += '<option value="2">Miền Trung</option>';
            html += '<option value="3">Miền Nam</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            $('#addRegion').append(html);
        } else {
            $('#region').remove();
        }
    })
});