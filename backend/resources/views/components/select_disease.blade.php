<script>
    $('select[name="category_id"]').change(function () {
        console.log($(this).val());
        $.ajax({
            type: 'GET',
            url: '{{ url('/disease/get_list_disease_by/category_id') }}/' + $(this).val(),
            dataType: 'json',
            success: function (response) {
                console.log(response.html);
                $('select[name="disease_id"]').html(response.html);
            }
        });
    });
</script>
