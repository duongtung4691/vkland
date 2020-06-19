/**
 * Create by: tiemtt
 * Created by: 20/12/2019
 */
(function ($) {
    if ($('#posts_category_banner_index').length > 0 || $('#posts_category_banner_form').length > 0) {
        ///////////////////////////////////////////////////////////////////////
        var i = $('#h_max_item_onpage').val().trim();
        if (i != null && i != "") {
            for (var j = i; j > 0; j--) {
                if (document.getElementById('cbkbanner' + j) != null) {
                    $('#cbkbanner' + j).on("click", function () {
                        // check status the checkbox of each item then set status the checkbox 'cbkbannerall'
                        if (is_check_all_or_not() == 1) {
                            document.getElementById('cbkbannerall').checked = true;
                        } else {
                            if (is_check_all_or_not() == 2 || is_check_all_or_not() == 3) {
                                document.getElementById('cbkbannerall').checked = false;
                            }
                        }

                        // get vals
                        var str_ckb_vals = get_cbk_checked();

                        var str_banner_id_checked = str_ckb_vals[0];
                        var first_banner_seq = str_ckb_vals[1];

                        $('#h_banners_id').val(str_banner_id_checked);
                        set_banner_default(first_banner_seq);
                        //reset_banners_paging(str_banner_id_checked);
                    });
                }
            }
        }
        ///////////////////////////////////////////////////////////////////////
        $('#cbkbannerall').on("click", function () {
            var i = $('#h_max_item_onpage').val().trim();
            if (i != null && i != "") {
                var cbkbannerall = document.getElementById('cbkbannerall');
                if (cbkbannerall != null && cbkbannerall.checked == true) {
                    for (var j = i; j > 0; j--) {
                        if (document.getElementById('cbkbanner' + j) != null) {
                            if (document.getElementById('cbkbanner' + j).checked == false) {
                                document.getElementById('cbkbanner' + j).checked = true;
                            }
                        }
                    }
                } else {
                    for (var j = i; j > 0; j--) {
                        if (document.getElementById('cbkbanner' + j) != null) {
                            if (document.getElementById('cbkbanner' + j).checked == true) {
                                document.getElementById('cbkbanner' + j).checked = false;
                            }
                        }
                    }
                }

                // get vals
                var str_ckb_vals = get_cbk_checked();

                var str_banner_id_checked = str_ckb_vals[0];
                var first_banner_seq = str_ckb_vals[1];

                $('#h_banners_id').val(str_banner_id_checked);
                set_banner_default(first_banner_seq);
                //reset_banners_paging(str_banner_id_checked);
            }
        });
        ///////////////////////////////////////////////////////////////////////
        function get_cbk_checked() {
            var ckb_item_default = '';
            var str_ckb_vals = '';
            var i = $('#h_max_item_onpage').val().trim();
            if (i != null && i != "") {
                for (var j = i; j > 0; j--) {
                    if (document.getElementById('cbkbanner' + j) != null) {
                        if (document.getElementById('cbkbanner' + j).checked == true) {
                            if (j == i) {
                                str_ckb_vals = str_ckb_vals + $("#cbkbanner" + j).val();
                            } else {
                                str_ckb_vals = str_ckb_vals + "-" + $("#cbkbanner" + j).val();
                            }
                            ckb_item_default = j;
                        }
                    }
                }
            }
            return [str_ckb_vals, ckb_item_default];
        }
        ///////////////////////////////////////////////////////////////////////
        function is_check_all_or_not() {
            var seq = 0;
            var seq1 = 0;
            var seq2 = 0;
            var i = $('#h_max_item_onpage').val().trim();
            if (i != "") {
                for (var j = i; j > 0; j--) {
                    if (document.getElementById('cbkbanner' + j) != null) {
                        seq++;
                        if (document.getElementById('cbkbanner' + j).checked == true) {
                            seq1++;
                        } else {
                            seq2++;
                        }
                    }
                }
            }
            if (seq == seq1) {
                return 1;
            } else {
                if (seq == seq2) {
                    return 2;
                } else {
                    return 3;
                }
            }
        }
        ///////////////////////////////////////////////////////////////////////
        function set_banner_default(first_banner_seq) {
            if (document.getElementById('cbkbanner' + first_banner_seq) != null) {
                if (document.getElementById('cbkbanner' + first_banner_seq).checked == true) {
                    $("input[name=is_default][value=" + $("#cbkbanner" + first_banner_seq).val() + "]").prop('checked', true);
                }
            }else{
                var i = $('#h_max_item_onpage').val().trim();
                if(i != null && i != ''){
                    for (var j = i; j > 0; j--) {
                        if (document.getElementById('cbkbanner' + j) != null) {
                            $("input[name=is_default][value=" + $("#cbkbanner" + j).val() + "]").prop('checked', false);
                        }
                    }
                }
            }
        }
        ///////////////////////////////////////////////////////////////////////
        $('input[type="radio"]').click(function(){
            if($('input[name=is_default]:checked')) {
                var default_checked_ok = 0;
                var default_checked_val = $('input[name=is_default]:checked').val();

                var str_ckb_vals = get_cbk_checked();
                var str_banner_id_checked = str_ckb_vals[0];
                var first_banner_seq = str_ckb_vals[1];

                if(str_banner_id_checked != null && str_banner_id_checked != ''){
                    var arr_ckb_vals = str_banner_id_checked.split("-");
                    if(arr_ckb_vals.length > 0) {
                        for (var i = 0; i < arr_ckb_vals.length; i++) {
                            if(arr_ckb_vals[i].trim() != ''){
                                if(default_checked_val == arr_ckb_vals[i].trim()){
                                    default_checked_ok = 1;
                                    break;
                                }
                            }
                        }
                    }
                }
                if(default_checked_ok == 0){
                    alert('Banner này chưa được chọn');
                    $("input[name=is_default][value=" + default_checked_val + "]").prop('checked', false);
                    if (document.getElementById('cbkbanner' + first_banner_seq) != null) {
                        $("input[name=is_default][value=" + $("#cbkbanner" + first_banner_seq).val() + "]").prop('checked', true);
                    }
                }
            }
        });
        ///////////////////////////////////////////////////////////////////////
        function reset_banners_paging(str_banner_id_checked) {
            if($('.pagination a.page-link').length > 0) {
                $(".pagination a.page-link").each(function () {
                    var $this = $(this);
                    var _href = $this.attr("href");
                    var _href = _href.split("&bnid");
                    $this.attr("href", _href[0] + '&bnid=' + str_banner_id_checked);
                });
            }
        }
        ///////////////////////////////////////////////////////////////////////
    }
})(jQuery);

