(function ($) {
    /**
     * Create by: tiemtt
     * Created by: 01/11/2019
     * Updated by:
     * Note:
     */
    /************************************************************************/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /************************************************************************/
    if ($('#posts_tags_form').length > 0 || $('#posts_tags_index').length > 0) {
        var url_pathname = window.location.pathname;
        var arr_pathname = (url_pathname != null && url_pathname != "") ? url_pathname.split("tags") : null;
        var arr_pathname_done = arr_pathname != null ? arr_pathname[0] : "";
        $.ajax({
            url: arr_pathname_done + "tags/addtags",
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                var jsonData = [];
                var fruits = result.data;
                for (var i = 0; i < fruits.length; i++) {
                    jsonData.push({id: fruits[i], name: fruits[i]});
                }
                var input_tags = $('#name').tagSuggest({
                    data: jsonData,
                    sortOrder: 'name',
                    maxDropHeight: 200,
                    name: 'input_tags'
                });
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
    /************************************************************************/
    $('#number_record_on_page').change(function() {
        var nr = $(this).val();
        get_number_record_on_page(nr);
    });
    function get_number_record_on_page(nr) {
        var url_pathname = window.location.pathname;
        var arr_pathname = (url_pathname != null && url_pathname != "")?url_pathname.split("tags"):null;
        var ajax_nr = 1;
        var txt_search_tag = document.getElementById('txt_search_tag') != null?'&p=' + $('#txt_search_tag').val().trim():'';
        $.ajax({
            url: arr_pathname[0] + "tags" + arr_pathname[1] + '?nr=' + nr + '&ajax_nr=' + ajax_nr + txt_search_tag,
            type: 'GET',
            dataType: 'json',
            data: {nr:nr, ajax_nr:ajax_nr},
            success: function (result) {
                $('#lst_tags').html(result.data);
                $('#number_record_on_page').change(function() {
                    var nr = $(this).val();
                    get_number_record_on_page(nr);
                });
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
    /*
    * End: tags
    * */

})(jQuery);

