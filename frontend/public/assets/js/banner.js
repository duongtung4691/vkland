/**
 * Create by: tiemtt
 * Created by: 20/12/2019
 */
(function ($) {
    if ($('#posts_banner_list').length > 0) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url_pathname = window.location.pathname;
        var arr_pathname = (url_pathname != null && url_pathname != "") ? url_pathname.split("banner") : null;
        var arr_pathname_done = arr_pathname != null ? arr_pathname[0] : "";
        ///////////////////////////////////////////////////////////////////////
        if ($('#posts_banner_list').length > 0) {
            var i = $('#h_max_item_onpage').val().trim();
            if (i != null && i != "") {
                for (var j = i; j > 0; j--) {
                    if (document.getElementById('cbkbanner' + j) != null) {
                        $('#cbkbanner' + j).on("click", function () {
                            var str_cbk_checked = get_cbk_checked();
                            if (str_cbk_checked != "") {
                                var p = get_url_p();
                                $("#posts_banner_list #a_cbkbannerall").attr("href", arr_pathname_done + "banner/delete/" + str_cbk_checked + p);
                            } else {
                                $("#posts_banner_list #a_cbkbannerall").attr("href", "#");
                            }

                            // check status from checkbox of items then set status the checkbox 'cbkbannerall'
                            if (is_check_all_or_not() == 1) {
                                document.getElementById('cbkbannerall').checked = true;
                            } else {
                                if (is_check_all_or_not() == 2 || is_check_all_or_not() == 3) {
                                    document.getElementById('cbkbannerall').checked = false;
                                }
                            }
                        });
                    }
                }
            }
        }
        ///////////////////////////////////////////////////////////////////////
        $('#cbkbannerall').on("click", function () {
            var i = $('#h_max_item_onpage').val().trim();
            if (i != "") {
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
            }
            // get para
            var str_ckb_del = get_cbk_checked();
            if (str_ckb_del != "") {
                var p = get_url_p();
                $("#posts_banner_list #a_cbkbannerall").attr("href", arr_pathname_done + "banner/delete/" + str_ckb_del + p);
            } else {
                $("#posts_banner_list #a_cbkbannerall").attr("href", "#");
            }
        });
        ///////////////////////////////////////////////////////////////////////
        $('#a_cbkbannerall').on("click", function () {
            var str_ckb_del = get_cbk_checked();
            if (str_ckb_del != "") {
                if (confirm('Bạn có chắc muốn xóa banner đã chọn không?')) {
                    return true;
                } else {
                    return false;
                }
            } else {
                alert("Bạn làm ơn check vào bản ghi muốn xóa!");
                return false;
            }
        });
        ///////////////////////////////////////////////////////////////////////
        function get_cbk_checked() {
            var str_ckb_del = '';
            var i = $('#h_max_item_onpage').val().trim();
            if (i != "") {
                for (var j = i; j > 0; j--) {
                    if (document.getElementById('cbkbanner' + j) != null) {
                        if (document.getElementById('cbkbanner' + j).checked == true) {
                            if (j == i) {
                                str_ckb_del = str_ckb_del + $("#cbkbanner" + j).val();
                            } else {
                                str_ckb_del = str_ckb_del + "-" + $("#cbkbanner" + j).val();
                            }
                        }
                    }
                }
            }
            return str_ckb_del;
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
        function get_url_p() {
            var p;
            var i = $('#h_max_item_onpage').val().trim();
            if (i != "") {
                for (var j = i; j > 0; j--) {
                    if (document.getElementById('a_banner_name' + j) != null) {
                        var href = $('#a_banner_name' + j).attr('href');
                        var arr_href = (href != null && href != "") ? href.split("?") : null;
                        p = (arr_href != null && (arr_href[1] != "" && arr_href[1] != null)) ? "?" + arr_href[1] : "";
                        break;
                    }
                }
            }
            return p;
        }
        ///////////////////////////////////////////////////////////////////////
    }
})(jQuery);

