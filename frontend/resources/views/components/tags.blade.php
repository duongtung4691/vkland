<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url_pathname = window.location.pathname;
    var arr_pathname = (url_pathname != null && url_pathname != "") ? url_pathname.split("tags") : null;
    var arr_pathname_done = arr_pathname != null ? arr_pathname[0] : "";
    $.ajax({
        url: "{{ url('tags/addtags') }}",
        type: 'POST',
        dataType: 'json',
        success: function (result) {
            var jsonData = [];
            var t = result.data;
            for (var i = 0; i < t.length; i++) {
                if (t[i] !== '')
                    jsonData.push({
                        id: t[i],
                        name: t[i]
                    });
            }
            var input_tags = $('#tags').tagSuggest({
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
</script>
