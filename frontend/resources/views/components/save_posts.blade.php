<script>
    $('button.btn-preview').click(function () {
        var form = $('#postForm');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize() + '&preview=true', // serializes the form's elements
            success: function (result, status, xhr) {
                var result = JSON.parse(result);
                window.open(result.redirect_url, '_blank');
            },
            error: function (xhr, status, error) {
                console.log(status + '; ' + error);
            }
        });
    });
    $('button.btn-unpublish').click(function () {
        var form = $('#postForm');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize() + '&mode=unpublish', // serializes the form's elements
            success: function (result, status, xhr) {
                var result = JSON.parse(result);
                alert(result.message);
                window.location.href = '/posts/edit/' + result.postId;
            },
            error: function (xhr, status, error) {
                console.log(status + '; ' + error);
            }
        });
    });
</script>
