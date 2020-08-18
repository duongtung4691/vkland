var categoriesJs = {
    addCatChild: function(parent) {
        $('#parent option').removeAttr("selected");

        options = $('#parent option[value=' + parent + ']').not('option[selected=selected]').attr('selected', 'selected');
        $('html, body').animate({
            scrollTop: $("#parent").offset().top
        }, 1000);
    },
};
$(document).ready(function() {
    $('.addCategory').on('click', function() {
        $("#code").prop('disabled', true);
        $(".catCode").addClass('hide');
        var id = $(this).data('id');
        $('html, body').animate({
            scrollTop: $("#parent").offset().top
        }, 1000);
        return $('#parent').val(id);
    });

    $('#parent').on('change', function() {
        if ($(this).val() == 0) {
            $("#code").prop('disabled', false);
            $(".catCode").removeClass('hide');
        } else {
            $("#code").prop('disabled', true);
            $(".catCode").addClass('hide');
        }
    });

});