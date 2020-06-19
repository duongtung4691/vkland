(function ($) {
    /**
     * Create by: tiemtt
     * Created by: 05/11/2019
     * Updated by:
     * Note:
     */
    if ($('#faqs_create').length > 0 || $('#faqs_form').length > 0 || $('#faqs_search_and_list').length > 0) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url_pathname = window.location.pathname;
        var arr_pathname = (url_pathname != null && url_pathname != "")?url_pathname.split("frequently-questions"):null;
        var arr_pathname_done = arr_pathname != null?arr_pathname[0]:"";
        if($('#faqs_search_and_list').length > 0){
            if(arr_pathname[1] == "/search"){
                if($("#search_form .panel_toolbox a.collapse-link i").length){
                    $("#search_form .panel_toolbox a.collapse-link i").addClass("fa-chevron-up");
                    $("#search_form .panel_toolbox a.collapse-link i").removeClass("fa-chevron-down");
                    $("#search_form .x_content").css("display", "block");
                }
            }
        }
        /*****/
        $('#category_id').change(function() {
            var category_id =  $('#category_id').val().trim();
            $.ajax({
                url: arr_pathname_done + "frequently-questions/catedise",
                type: 'POST',
                dataType: 'json',
                data: {category_id:category_id},
                success: function (result) {
                    $('#lst_diseases').html(result.data);
                    if($('#faqs_search_and_list').length > 0){
                        $('#faqs_search_and_list .cbkdiseases').on("click", function () {
                            question_search();
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
            if($('#faqs_search_and_list').length > 0){
                question_search();
            }
      });
        /*****/
      $('#faqs_search_and_list #question').on('input propertychange', function () {
          question_search();
      });
      $('#faqs_search_and_list #author_name').on('input propertychange', function () {
          question_search();
      });
      $('#faqs_search_and_list #status').on('input propertychange', function () {
          question_search();
      });
      function question_search() {
          var question = "";
          var category_id = "";
          var diseases = "";
          var author_name = "";
          var status = "";

          var arr_vals = get_params();
          if (arr_vals.length > 0) {
              $.each(arr_vals, function (key, value) {
                  //----
                  if (value.indexOf("QUESTION-VAL") != -1) {
                      value = value.split("QUESTION-VAL");
                      question = value[0];
                  }
                  //----
                  if (value.indexOf("CATEGORYID-VAL") != -1) {
                      value = value.split("CATEGORYID-VAL");
                      category_id = value[0];
                  }
                  //----
                  if (value.indexOf("DISEASES-VAL") != -1) {
                      value = value.split("DISEASES-VAL");
                      diseases = value[0];
                  }
                  //----
                  if (value.indexOf("AUTHOR-NAME-VAL") != -1) {
                      value = value.split("AUTHOR-NAME-VAL");
                      author_name = value[0];
                  }
                  //----
                  if (value.indexOf("STATUS-VAL") != -1) {
                      value = value.split("STATUS-VAL");
                      status = value[0];
                  }
                  //----
              });
              //var str_params =  "QUESTION=" + question + " - CATEGORYID=" + category_id + " - DISEASES-VAL=" + diseases + " - AUTHOR NAME=" + author_name + " - STATUS=" + status;
		      //alert(str_params);

		      $.ajax({
                  url: arr_pathname_done + "frequently-questions/search",
                  type: 'POST',
                  dataType: 'json',
                  data: {question:question, category_id:category_id, diseases:diseases, author_name:author_name, status:status},
                  success: function (result) {
                      $('#lst_question').html(result.data);

                      // set onclick
                      cbk_set_onclick_allitems();
                      for_cbkquestionall();
                      for_a_cbkquestionall();
                  },
                  error: function (xhr, status, error) {
                      console.log(error);
                  }
              });
          }
      }
        /*****/
        function  get_params() {
            var seq = 0;
            var arr_val = new Array();

            // vals from search box on top page
            if(document.getElementById("question") != null){
                var question = $("#faqs_search_and_list #question").val();
                arr_val[seq] = question + "QUESTION-VAL";
                seq++;
            }
            if(document.getElementById("category_id") != null){
                var category_id = $("#faqs_search_and_list #category_id").val();
                arr_val[seq] = category_id + "CATEGORYID-VAL";
                seq++;
            }
            if($('.cbkdiseases').length > 0){
                var selectedValue = "";
                $('.cbkdiseases').each(function(idx, el){
                    if($(el).is(':checked')){
                        selectedValue = selectedValue + $(el).val() + "-";
                    }
                });
                arr_val[seq] = selectedValue + "DISEASES-VAL";
                seq++;
            }
            if(document.getElementById("author_name") != null){
                var author_name = $("#faqs_search_and_list #author_name").val();
                arr_val[seq] = author_name + "AUTHOR-NAME-VAL";
                seq++;
            }
            if(document.getElementById("status") != null){
                var status = $("#faqs_search_and_list #status").val();
                arr_val[seq] = status + "STATUS-VAL";
                seq++;
            }
            return arr_val;
        }

        /************************************************************************/
        // for delete the items
        /************************************************************************/
        cbk_set_onclick_allitems();
        function cbk_set_onclick_allitems(){
            if ($('#faqs_search_and_list').length > 0) {
                var i = $('#h_max_item_onpage').val().trim();
                if (i != "") {
                    for (var j = i; j > 0; j--) {
                        if (document.getElementById('cbkquestion' + j) != null) {
                            $('#cbkquestion' + j).on("click", function () {
                                var str_cbk_checked = get_cbk_checked();
                                if (str_cbk_checked != "") {
                                    var p = get_url_p();
                                    $("#faqs_search_and_list #a_cbkquestionall").attr("href", arr_pathname_done + "frequently-questions/delete/" + str_cbk_checked + p);
                                } else {
                                    $("#faqs_search_and_list #a_cbkquestionall").attr("href", "#");
                                }

                                // check status from checkbox of items then set status the checkbox 'cbkquestionall'
                                if (is_check_all_or_not() == 1) {
                                    document.getElementById('cbkquestionall').checked = true;
                                } else {
                                    if (is_check_all_or_not() == 2 || is_check_all_or_not() == 3) {
                                        document.getElementById('cbkquestionall').checked = false;
                                    }
                                }
                            });
                        }
                    }
                }
            }
        }
        /*****/
        for_cbkquestionall();
        function for_cbkquestionall(){
            $('#cbkquestionall').on("click", function () {
                var i =  $('#h_max_item_onpage').val().trim();
                if(i != "") {
                    var cbkquestionall = document.getElementById('cbkquestionall');
                    if(cbkquestionall != null && cbkquestionall.checked == true){
                        for (var j = i; j > 0; j--) {
                            if(document.getElementById('cbkquestion'+j) != null){
                                if(document.getElementById('cbkquestion'+j).checked == false){
                                    document.getElementById('cbkquestion'+j).checked = true;
                                }
                            }
                        }
                    }else{
                        for (var j = i; j > 0; j--) {
                            if(document.getElementById('cbkquestion'+j) != null){
                                if(document.getElementById('cbkquestion'+j).checked == true){
                                    document.getElementById('cbkquestion'+j).checked = false;
                                }
                            }
                        }
                    }
                }
                // get para
                var str_ckb_del = get_cbk_checked();
                if(str_ckb_del != ""){
                    var p = get_url_p();
                    $("#faqs_search_and_list #a_cbkquestionall").attr("href", arr_pathname_done + "frequently-questions/delete/" + str_ckb_del + p);
                }else{
                    $("#faqs_search_and_list #a_cbkquestionall").attr("href", "#");
                }
            });
        }
        /*****/
        for_a_cbkquestionall();
        function for_a_cbkquestionall() {
            $('#a_cbkquestionall').on("click", function () {
                var str_ckb_del = get_cbk_checked();
                if(str_ckb_del != "") {
                    if (confirm('Bạn có chắc muốn xóa question đã chọn chứ?')) {
                        return true;
                    } else {
                        return false;
                    }
                }else{
                    alert("Bạn làm ơn check vào bản ghi muốn xóa!");
                    return false;
                }
            });
        }
        /*****/
        function get_cbk_checked(){
            var str_ckb_del = '';
            var i =  $('#h_max_item_onpage').val().trim();
            if(i != "") {
                for (var j = i; j > 0; j--) {
                    if(document.getElementById('cbkquestion'+j) != null){
                        if(document.getElementById('cbkquestion'+j).checked == true){
                            if(j == i){
                                str_ckb_del = str_ckb_del + $("#cbkquestion"+j).val();
                            }else{
                                str_ckb_del = str_ckb_del + "-" + $("#cbkquestion"+j).val();
                            }
                        }
                    }
                }
            }
            return str_ckb_del;
        }
        /*****/
        function is_check_all_or_not(){
            var seq = 0;
            var seq1 = 0;
            var seq2 = 0;
            var i =  $('#h_max_item_onpage').val().trim();
            if(i != "") {
                for (var j = i; j > 0; j--) {
                    if(document.getElementById('cbkquestion'+j) != null){
                        seq++;
                        if(document.getElementById('cbkquestion'+j).checked == true){
                            seq1++;
                        }else{
                            seq2++;
                        }
                    }
                }
            }
            if(seq == seq1){
                return 1;
            }else{
                if(seq == seq2){
                    return 2;
                }else{
                    return 3;
                }
            }
        }
        /*****/
        function get_url_p(){
            var p;
            var i = $('#h_max_item_onpage').val().trim();
            if (i != "") {
                for (var j = i; j > 0; j--) {
                    if (document.getElementById('a_question_name' + j) != null) {
                        var href = $('#a_question_name' + j).attr('href');
                        var arr_href = (href != null && href.indexOf("?"))?href.split("?"):null;
                        p = arr_href != null?"?" + arr_href[1]:"";
                        break;
                    }
                }
            }
            return p;
        }

        /************************************************************************/
        /*add TAGS*/
        /************************************************************************/
        $.ajax({
            url: arr_pathname_done + "frequently-questions/addtags",
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                var jsonData = [];
                var tag = result.data;
                for(var i = 0 ; i < tag.length ; i++){
                    jsonData.push({id:{tagID:tag[i]['tagID'],tagName:tag[i]['tagName']},name:tag[i]['tagName']});
                }
                var input_tags = $('#input_tags').tagSuggest({
                    data: jsonData,
                    sortOrder: 'name',
                    maxDropHeight: 200,
                    name: 'input_tags',
                    editable: false
                });
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
        /*************/
    }
    /*
    * End: frequently-questions
    * */

})(jQuery);


