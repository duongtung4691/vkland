<script>
    var maxWord = '{{ config()->get('constants.LIMIT_WORD_COUNT_EXCERPT') }}';
    $('textarea[name="excerpt"]').keydown(function (e) {
        wordSplit = $(this).val().split(/[\s]+/);
        if (wordSplit.length > maxWord) {
            if (e.keyCode == 46 || e.keyCode == 8) { // Allow backspace and delete buttons
            } else if (e.keyCode < 48 || e.keyCode > 57) { // Disallow all other buttons
                e.preventDefault();
            }
            wordLeft = 0;
        } else {
            wordLeft = maxWord - wordSplit.length;
        }
        $('.word-left').html('Còn thêm được <strong>' + wordLeft + '</strong> từ nữa');
        if (wordLeft == 0) {
            $('.word-left').css({
                'background-color': 'red'
            }).prepend('<i class="fa fa-exclamation-triangle"></i>&nbsp;');
        }
    });
</script>