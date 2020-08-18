$(document).ready(function() {


    //if ($('.select2').length > 0) {
        //$('.select2').select2();
    //}

    var script = [
        '/public/assets/js/backend/area.js',
        '/public/assets/js/backend/categories.js'
    ];
    $.each(script, function(key, script) {
        $("body").append('<script type="text/javascript" src="' + script + '"></script>');
    });

    var t = $(location).attr("href");
    var sz_CurrentHost = t.split("/")[0] + "//" + t.split("/")[2];

    jQuery(document.body).on('change', '.imgInp', function(event) {
        var me = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                me.closest('div').find('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $('input[name=permalink]').focus(function() {
        var value = $("input[name=name]").val();
        if (value == '') {
            // alert('Bạn chưa nhập tên');
            return false;
        }
        var sz_alias = convert(value);
        $(this).val(sz_alias);
        // jQuery.ajax({
        //     type: 'post',
        //     url: GLOBAL.sz_CurrentHost + '/admin_ajax',
        //     data: {
        //         func:'check-alias',
        //         val: sz_alias,
        //         tbl: GLOBAL.sz_Tbl,
        //     },
        //     dataType: 'json',
        //     success: function (res) {
        //         if(res.result == 0) alert(res.alert);
        //         else o_alias.val(sz_alias);
        //     },
        // });
    });

    function convert(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
        str = str.replace(/-+-/g, "-");
        str = str.replace(/^\-+|\-+$/g, "");
        str = str.replace(/–/g, "");
        return str;
    }

    $('.changeAjax').change(function() {
        var field = $(this).attr('data-field');
        var me = $(this);
        var id = $(this).attr('data-id');
        var tbl = $('.tbl').val();
        if ($(this).attr('type') == 'checkbox') {
            if ($(this).is(':checked')) {
                var value = true;
            } else {
                var value = false;
            }
        } else var value = $(this).val();
        if (field == 'statusProductManager') {
            var str = '';
            if (value == 1) str = 'Chuyển đặt chỗ';
            else if (value == 2) str = 'Chuyển đặt mua';
            else if (value == 3) str = 'Từ chối';
            if (!confirm("Bạn có muốn thay đổi sang " + str + "?")) {
                $(this).val($(this).attr('prvselectedvalue')); //set back;
                return false;
            }
        }

        var arrData = {
            id: id,
            tbl: tbl,
            field: field,
            val: value,
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'changeValue',
                arrData: arrData,
            },
            dataType: 'json',
            success: function(res) {
                if (res.success == 1 && tbl == 'villa' && field == 'status') {
                    var tr = me.closest('tr');
                    switch (value) {
                        case '1':
                            tr.removeAttr('class').attr('class', 'aNormal');
                            break;
                        case '2':
                            tr.removeAttr('class').attr('class', 'aBooking');
                            break;
                        case '3':
                            tr.removeAttr('class').attr('class', 'aReservation');
                            break;
                        case '4':
                            tr.removeAttr('class').attr('class', 'aOrder');
                            break;
                        case '5':
                            tr.removeAttr('class').attr('class', 'aSell');
                            break;
                        case '6':
                            tr.removeAttr('class').attr('class', 'aRetrieve');
                            break;
                    }
                }
                if (field == 'statusProductManager') {
                    window.location = window.location.href;
                }
            }
        });
    });

    $(document).on('click', '.add-section', function() {
        //var index = $('.block-clone').length;
        //var numberSection = $('.project-section .section').length;
        var numberSection = $('.project-section .section.block_vi').last().attr('sectionnumber');
        var numberSection = parseInt(numberSection) + 1;
        var parent = $(this).closest('section');
        var objectClone = parent.find('.block-clone').last().clone();
        objectClone.find("input[type=text]").removeAttr('value');
        objectClone.find("input[type=number]").removeAttr('value');
        objectClone.find("input[type=radio]").removeAttr('checked');
        objectClone.find("input[name^=sectionName]").attr('name', 'sectionName[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionOrder]").attr('name', 'sectionOrder[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionActive]").attr('name', 'sectionActive[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionTitle]").attr('name', 'sectionTitle[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionShowTab]").attr('name', 'sectionShowTab[' + numberSection + ']').attr('checked', true);
        var htmlClone = objectClone.wrap("<div/>").parent().html();

        var textareaId = 'id_' + jQuery.now();
        var textAreaHtml = '<div class="form-group"><div class="col-xs-12 col-sm-12 no-padding"><label class="col-xs-12 col-sm-1 control-label text-left">Nội dung</label> <div class="col-xs-12 col-sm-11 no-padding"> <textarea name="sectionDetail[' + numberSection + ']" class="tinymce" id="' + textareaId + '"></textarea></div></div></div>';
        //var numberImg = $('.project-section .block-img-section').length;

        var blockImg = '<div class="col-xs-12 col-md-4 col-sm-4 block-img-section " style="height: 200px;" number="0"><a href="/public/filemanager/dialog.php?type=1&field_id=sectionImg-' + numberSection + '-0" class="btn btn-primary iframe-btn" type="button">Chọn ảnh</a> <img class="imgUpload" src="" alt=""> <input type="hidden" class="form-control urlHide" id="sectionImg-' + numberSection + '-0" name="sectionImg[' + numberSection + '][]" value=""></div><div class="clearfix"></div><br><button type="button" class="btn btn-primary btn-sm col-xs-2 col-sm-2 add-img-section">Thêm ảnh</button><div class="col-xs-4 col-sm-4 no-padding"><select class="form-control" name="sectionImgPos[' + numberSection + ']"><option>Hiển thị đầu section</option><option>Hiển thị cuối section</option></select> </div>';

        var blockZoom = '<div class="col-xs-4 col-sm-4 no-padding"><label><input name="sectionZoom[' + numberSection + ']" type="checkbox" value="1" > Zoom Ảnh</label></div>';

        var html = htmlClone + textAreaHtml + blockImg + blockZoom;
        //$('.block-section').append('<div class="tile-body block-form-title-body" style="display: block;">').append(htmlClone).append(textAreaHtml).append('</div>');
        $(this).before('<div class="tile-body block-form-title-body section block_vi" style="display: block;" sectionnumber="' + numberSection + '">' + html + '</div>');
        AddRemoveTinyMce(textareaId);
    });
    // them session

    $(document).on('click', '.add-section_en', function() {
        //var index = $('.block-clone').length;
        //var numberSection = $('.project-section .section').length;
        var numberSection = $('.project-section .section.block_en').last().attr('sectionnumber');
        var numberSection = parseInt(numberSection) + 1;
        var parent = $(this).closest('section');
        var objectClone = parent.find('.block-clone').last().clone();
        objectClone.find("input[type=text]").removeAttr('value');
        objectClone.find("input[type=number]").removeAttr('value');
        objectClone.find("input[type=radio]").removeAttr('checked');
        objectClone.find("input[name^=sectionName_en]").attr('name', 'sectionName_en[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionOrder_en]").attr('name', 'sectionOrder_en[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionActive_en]").attr('name', 'sectionActive_en[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionTitle_en]").attr('name', 'sectionTitle_en[' + numberSection + ']').attr('checked', true);
        objectClone.find("input[name^=sectionShowTab_en]").attr('name', 'sectionShowTab_en[' + numberSection + ']').attr('checked', true);
        var htmlClone = objectClone.wrap("<div/>").parent().html();

        var textareaId = 'id_' + jQuery.now();
        var textAreaHtml = '<div class="form-group"><div class="col-xs-12 col-sm-12 no-padding"><label class="col-xs-12 col-sm-1 control-label text-left">Nội dung</label> <div class="col-xs-12 col-sm-11 no-padding"> <textarea name="sectionDetail_en[' + numberSection + ']" class="tinymce" id="' + textareaId + '"></textarea></div></div></div>';
        //var numberImg = $('.project-section .block-img-section').length;

        var blockImg = '<div class="col-xs-12 col-md-4 col-sm-4 block-img-section " style="height: 200px;" number="0"><a href="/public/filemanager/dialog.php?type=1&field_id=sectionImg_en-' + numberSection + '-0" class="btn btn-primary iframe-btn_en" type="button">Chọn ảnh</a> <img class="imgUpload" src="" alt=""> <input type="hidden" class="form-control urlHide" id="sectionImg_en-' + numberSection + '-0" name="sectionImg_en[' + numberSection + '][]" value=""></div><div class="clearfix"></div><br><button type="button" class="btn btn-primary btn-sm col-xs-2 col-sm-2 add-img-section_en">Thêm ảnh</button><div class="col-xs-4 col-sm-4 no-padding"><select class="form-control" name="sectionImgPos_en[' + numberSection + ']"><option>Hiển thị đầu section</option><option>Hiển thị cuối section</option></select> </div>';

        var blockZoom = '<div class="col-xs-4 col-sm-4 no-padding"><label><input name="sectionZoom_en[' + numberSection + ']" type="checkbox" value="1" > Zoom Ảnh</label></div>';

        var html = htmlClone + textAreaHtml + blockImg + blockZoom;

        //$('.block-section').append('<div class="tile-body block-form-title-body" style="display: block;">').append(htmlClone).append(textAreaHtml).append('</div>');
        $(this).before('<div class="tile-body block-form-title-body section block_en" style="display: block;" sectionnumber="' + numberSection + '">' + html + '</div>');
        AddRemoveTinyMce(textareaId);
    });


    $(document).on('click', '.delete-section', function() {
        $(this).closest('.section').remove();
    });


    ///Add ảnh phần slide ảnh dự án///
    $(document.body).on("click", ".add-img", function() {
        // $('.add-img').click(function () {
        var numberBlockImg = $(this).closest('section').find('.block-img').last().attr('number');
        var next = parseInt(numberBlockImg) + 1;
        var html = $(this).closest('section').find('.block-img').last().clone();
        html.attr('number', next);
        html.find(".imgUpload").attr('src', '');
        if ($('.section').length) {
            html.find("a.iframe-btn").attr('href', '/public/filemanager/dialog.php?type=1&field_id=img-' + next);
            html.find(".urlHide").attr('id', 'img-' + next);
            html.find("#img-" + next).val('');
        } else {
            var idFilemanager = $(this).closest('section').attr('id');
            html.find("a.iframe-btn").attr('href', '/public/filemanager/dialog.php?type=1&field_id=' + idFilemanager + '-' + next);
            html.find(".urlHide").attr('id', idFilemanager + '-' + next);
            html.find('#' + idFilemanager + '-' + next).val('');
            // html.find('.captionImg').remove();
        }
        html.find('.delete-img').remove();
        $(this).closest('section').find('.block-img').last().after(html);
    });

    ///Add ảnh cho các section///
    $(document.body).on("click", ".add-img-section", function() {
        // $('.add-img').click(function () {
        var parentSection = $(this).closest('.section');
        var numberBlockImg = parentSection.find('.block-img-section').last().attr('number');
        var nextBlockImg = parseInt(numberBlockImg) + 1;
        var numberSection = parentSection.attr('sectionnumber');
        html = parentSection.find('.block-img-section').last().clone();

        html.attr('number', nextBlockImg);
        html.find(".imgUpload").attr('src', '');
        html.find("a.iframe-btn").attr('href', '/public/filemanager/dialog.php?type=1&field_id=sectionImg-' + numberSection + '-' + nextBlockImg);
        html.find(".urlHide").attr({
            id: 'sectionImg-' + numberSection + '-' + nextBlockImg,
            name: 'sectionImg[' + numberSection + '][]',
            value: ''
        });
        html.find('.delete-img-section').remove();
        html.find('.captionImg').remove();
        //html.find("#sectionImg-"+numberBlockImg).val('');
        parentSection.find('.block-img-section').last().after(html);
    });
    $(document.body).on("click", ".add-img-section_en", function() {
        // $('.add-img').click(function () {
        var parentSection = $(this).closest('.section');
        var numberBlockImg = parentSection.find('.block-img-section').last().attr('number');
        var nextBlockImg = parseInt(numberBlockImg) + 1;
        var numberSection = parentSection.attr('sectionnumber');
        html = parentSection.find('.block-img-section').last().clone();
        console.log(nextBlockImg, '11111111');
        console.log(html, 'xxxxxxx');
        html.attr('number', nextBlockImg);
        html.find(".imgUpload").attr('src', '');
        html.find("a.iframe-btn_en").attr('href', '/public/filemanager/dialog.php?type=1&field_id=sectionImg_en-' + numberSection + '-' + nextBlockImg);
        html.find(".urlHide").attr({
            id: 'sectionImg_en-' + numberSection + '-' + nextBlockImg,
            name: 'sectionImg_en[' + numberSection + '][]',
            value: ''
        });
        html.find('.delete-img-section').remove();
        html.find('.captionImg').remove();
        //html.find("#sectionImg-"+numberBlockImg).val('');
        parentSection.find('.block-img-section').last().after(html);
    });


    ////////////ADD ẢNH MẶT BẰNG DỰ ÁN//////////////
    $('.addBlockRootApartmentType').on('click', function() {
        var rootIndex = $('.blockRootApartmentType').length;
        var html = '<div class="tile-body block-form-title-body blockRootApartmentType" root-index="' + rootIndex + '" style="display: block; border-bottom: dotted 2px #ccc;">' + '<div class="col-xs-12 col-sm-12 no-padding">' + '<label class="col-xs-12 col-sm-2 control-label text-left">Ảnh gốc</label>' + '<div class="col-xs-12 col-sm-10 no-padding">' + '<a href="/public/filemanager/dialog.php?type=1&field_id=rootApartmentTypeImg-' + rootIndex + '" class="btn btn-primary btn-sm iframe-btn" type="button">Chọn ảnh</a>' + '<a class="btn btn-danger btn-sm delRootApartmentType" type="button">Xóa khối</a>' + '<img class="imgUpload" src="" alt="">' + '<input type="hidden" class="form-control urlHide" id="rootApartmentTypeImg-' + rootIndex + '" name="apartmentType[' + rootIndex + '][rootImg]" value="">' + '</div>' + '</div>'

            + '<div class="col-xs-12 col-sm-12 no-padding blockChildApartmentType">' + '<div class="col-xs-12 col-sm-2 control-label text-left">' + '<label class="col-xs-12 col-sm-12 control-label text-left">Ảnh con</label>' + '<button type="button" class="btn btn-primary btn-sm addChildApartmentTypeImg">Thêm ảnh con</button>' + '</div>' + '<div class="col-xs-12 col-sm-10 no-padding childApartmentTypeImg">' + '</div>' + '</div>' + '<div class="clearfix"></div>' + '<br>' + '</div>';
        $(this).before(html);
    });

    ////Thêm ảnh con phần mặt bằng dự án/////
    $(document.body).on("click", ".addChildApartmentTypeImg", function() {
        var rootIndex = $(this).closest('.blockRootApartmentType').attr('root-index');
        var ChildIndex = $(this).closest('.blockChildApartmentType').find('.indexOfChildImg').length;
        var html = '<div class="col-xs-12 col-md-4 col-sm-4">' + '<a href="/public/filemanager/dialog.php?type=1&field_id=childApartmentTypeImg-' + rootIndex + '-' + ChildIndex + '" class="btn btn-primary btn-sm iframe-btn" type="button">Thêm</a>' + '<a class="btn btn-danger btn-sm delChildImg" type="button">Xóa</a>' + '<img class="imgUpload" src="" alt="">' + '<input type="hidden" class="form-control urlHide indexOfChildImg" id="childApartmentTypeImg-' + rootIndex + '-' + ChildIndex + '" name="apartmentType[' + rootIndex + '][img][]" value="">' + '<textarea placeholder="Tên ảnh" name="apartmentType[' + rootIndex + '][name][]"></textarea>' + '<textarea placeholder="Tọa độ ảnh" name="apartmentType[' + rootIndex + '][map][]"></textarea>' + '</div>';
        $(this).closest('.blockChildApartmentType').find('.childApartmentTypeImg').append(html);
    });

    ////Xóa ảnh con phần mặt bằng dự án hoặc ảnh slide dự án/////
    $(document.body).on("click", ".delChildImg", function() {
        if (confirm("Bạn có muốn xóa ảnh con này?")) {
            $(this).closest('div').remove();
        }
    });

    ////Xóa cả khối mặt bằng dự án/////
    $(document.body).on("click", ".delRootApartmentType", function() {
        if (confirm("Xóa toàn bộ khối này sẽ xóa toàn bộ các ảnh con trong đó. Bạn có muốn tiếp tục?")) {
            $(this).closest('.blockRootApartmentType').remove();
        }
    });
    ////////////END ADD ẢNH MẶT BẰNG DỰ ÁN/////////////////

    $('.load-areas').change(function() {
        var parentId = $(this).val();
        var parentType = $(this).attr('id');
        var option = '<option value="">Quận/Huyện</option>';
        if (parentId != '') {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'loadAreas',
                    parentId: parentId,
                },
                dataType: 'json',
                success: function(data) {
                    $.each(data.areas, function(i, item) {
                        option += '<option value="' + item._id.$id + '">' + item.name + '</option>';
                    });
                    if (parentType == 'city') $('#district').html(option);
                    else $('#ward').html(option);
                    $('#region').val(data.region);
                }
            });
        } else {
            $('#district').html(option);
        }
    });

    $('.loadBuilding').change(function() {
        var projectId = $(this).val();
        if (projectId != 0) {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'loadBuilding',
                    projectId: projectId
                },
                dataType: 'json',
                success: function(data) {
                    var option = '<option value="">Chọn Tòa</option>';
                    if (data.type == 'chung-cu') {
                        $('#buildingOrZone').attr("required", true);
                        if ($('#status').length) {
                            $('#status').val('').hide();
                        }
                        if (data.buildingOrZone.length > 0) {
                            $.each(data.buildingOrZone, function(i, item) {
                                option += '<option value="' + item._id.$id + '">' + item.displayName + '</option>';
                            });
                        }
                    } else {
                        option = '<option value="">Chọn Khu</option>';
                        $('#buildingOrZone').removeAttr('required');
                        if (data.buildingOrZone.length > 0) {
                            $.each(data.buildingOrZone, function(i, item) {
                                option += '<option value="' + item._id.$id + '">' + item.code + '</option>';
                            });
                        }
                    }
                    $('#building').html(option);
                    $('#buildingOrZone').html(option);
                }
            });
        } else {
            $('#building').html('<option value="">Chọn Tòa/Khu</option>');
        }
    });
    $('.loadZone').change(function() {
        var projectId = $(this).val();
        var option = '<option value="">Tìm theo Khu</option>';
        $('#zone').html(option);
        if (projectId != 0) {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'loadZone',
                    projectId: projectId
                },
                dataType: 'json',
                success: function(data) {
                    $.each(data.zones, function(i, item) {
                        option += '<option value="' + item._id.$id + '">' + item.code + '</option>';
                    });
                    $('#zone').html(option);
                }
            });
        } else {
            $('#zone').html(option);
        }
    });
    $('.loadBlock').change(function() {
        var zoneId = $(this).val();
        var option = '<option value="">Tìm theo Block</option>';
        $('#block').html(option);
        if (zoneId != 0) {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'loadBlock',
                    zoneId: zoneId
                },
                dataType: 'json',
                success: function(data) {
                    $.each(data.blocks, function(i, item) {
                        option += '<option value="' + item._id.$id + '">' + item.code + '</option>';
                    });
                    $('#block').html(option);
                }
            });
        } else {
            $('#block').html(option);
        }
    });
    $('.saleDepart').change(function() {
        var optionBuild = '<option value="">Chọn Tòa/Khu</option>';
        $('#building').html(optionBuild);
        $('#buildingOrZone').html(optionBuild);
        var depart = $(this).val();
        var optionProject = '<option value="">Chọn dự án</option>';
        $('#loadBuilding').html(optionProject);

        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadProjectFromDepart',
                depart: depart
            },
            dataType: 'json',
            success: function(data) {
                $.each(data.projects, function(id, name) {
                    optionProject += '<option value="' + id + '">' + name + '</option>';
                });
                $('.loadBuilding').html(optionProject);
            }
        });
        $(".loadBuilding").select2("destroy");
        $(".loadBuilding").select2();
    });

    $('.loadAreaVilla').change(function() {
        var type = $(this).attr('id');
        var root = $(this).val();
        if (type == 'project') {
            var option = '<option value="">Thuộc Khu</option>';
            $('#parentAreaVilla').html(option);
            $('#childAreaVilla').html('<option value="">Thuộc Phân Khu</option>');
        } else {
            var option = '<option value="">Thuộc Phân Khu</option>';
            $('#childAreaVilla').html(option);
        }

        if (root != 0) {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'loadAreaVilla',
                    root: root,
                    type: type
                },
                dataType: 'json',
                success: function(data) {
                    $.each(data.areaVilla, function(i, item) {
                        option += '<option value="' + item._id.$id + '">' + item.code + '</option>';
                    });
                    if (type == 'project') {
                        $('#parentAreaVilla').html(option);
                        $('#childAreaVilla').html('<option value="">Thuộc Phân Khu</option>');
                    } else {
                        $('#childAreaVilla').html(option);
                    }
                }
            });
        } else {
            if (type == 'project') {
                $('#parentAreaVilla').html(option);
                $('#childAreaVilla').html('<option value="">Thuộc Phân Khu</option>');
            } else {
                $('#childAreaVilla').html(option);
            }
        }
    });

    $('.updateApartment').click(function() {
        //var apartment = $(this).closest('.changeSttApartment').attr('id');
        var apartment = $(this).attr('id');
        tinymce.get('note').setContent('');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadInfoApartment',
                apartment: apartment
            },
            dataType: 'json',
            success: function(data) {
                $("#modalApartment").modal();
                $('#submitApartment').attr('data-apartment', apartment);
                $('#priceHeartWall').val(data.price.heartWall);
                $('#priceWaterWall').val(data.price.waterWall);
                $('#priceTotal').val(data.price.total);
                $('#priceTotalMin').val(data.price.totalMin);
                $('#priceTotalMax').val(data.price.totalMax);
                $('#codeApartment').val(data.code);
                $('#seller').val(data.seller);
                $('#gioihanyeucaulock').val(data.gioihanyeucaulock);
                $('#gioihanlockthanhcong').val(data.gioihanlockthanhcong);
                $('#yeucaucoc').val(data.yeucaucoc);
                $('#statusApartment option').each(function() {
                    if ($(this).val() == data.status) {
                        $(this).prop("selected", true);
                    }
                });
                $('#dayReservation').val(data.dayOfSale.dayReservation);
                // if(data.dayOfSale.dayReservation[1] == 1){
                //     $("#showDayReservation").prop('checked', true);
                // }
                $('#dayBooking').val(data.dayOfSale.dayBooking);
                // if(data.dayOfSale.dayBooking[1] == 1){
                //     $("#showDayBooking").prop('checked', true);
                // }
                $('#dayOrder').val(data.dayOfSale.dayOrder);
                // if(data.dayOfSale.dayOrder[1] == 1){
                //     $("#showDayOrder").prop('checked', true);
                // }
                $('#daySell').val(data.dayOfSale.daySell);
                // if(data.dayOfSale.daySell[1] == 1){
                //     $("#showDaySell").prop('checked', true);
                // }
                $('#dayRetrieve').val(data.dayOfSale.dayRetrieve);
                // if(data.dayOfSale.dayRetrieve[1] == 1){
                //     $("#showDayRetrieve").prop('checked', true);
                // }
                if (typeof data.saleUnit !== "undefined" && data.saleUnit.id != null) {
                    $("#salesUnit > option").each(function() {
                        if (this.value == data.saleUnit.id.$id) {
                            $('#salesUnit').val(data.saleUnit.id.$id);
                        }
                    });
                }
                tinyMCE.get('note').setContent(data.note);
                $('#titleApartmentName').text(data.code);
            }
        });
    });

    $('#submitApartment').click(function() {
        var apartment = $(this).attr('data-apartment');
        var acreageHeartWall = $('#acreageHeartWall').val();
        var acreageWaterWall = $('#acreageWaterWall').val();
        var priceHeartWall = $('#priceHeartWall').val();
        var priceWaterWall = $('#priceWaterWall').val();
        var priceTotal = $('#priceTotal').val();
        var priceTotalMin = $('#priceTotalMin').val();
        var priceTotalMax = $('#priceTotalMax').val();
        var dayReservation = $('#dayReservation').val();
        //var showDayReservation = $('#showDayReservation').is(":checked") ? 1 : 0;
        var dayBooking = $('#dayBooking').val();
        //var showDayBooking = $('#showDayBooking').is(":checked") ? 1 : 0;
        var dayOrder = $('#dayOrder').val();
        //var showDayOrder = $('#showDayOrder').is(":checked") ? 1 : 0;
        var daySell = $('#daySell').val();
        //var showDaySell = $('#showDaySell').is(":checked") ? 1 : 0;
        var dayRetrieve = $('#dayRetrieve').val();
        //var showDayRetrieve = $('#showDayRetrieve').is(":checked") ? 1 : 0;
        var status = $('#statusApartment').val();
        var seller = $('#seller').val();
        var saleUnit = $('#salesUnit').val();
        var gioihanyeucaulock = $('#gioihanyeucaulock').val();
        var gioihanlockthanhcong = $('#gioihanlockthanhcong').val();
        var yeucaucoc = $('#yeucaucoc').val();
        tinyMCE.triggerSave();
        var note = $('#note').val();
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'updateApartment',
                apartment: apartment,
                acreageHeartWall: acreageHeartWall,
                acreageWaterWall: acreageWaterWall,
                priceHeartWall: priceHeartWall,
                priceWaterWall: priceWaterWall,
                priceTotal: priceTotal,
                priceTotalMin: priceTotalMin,
                priceTotalMax: priceTotalMax,
                dayReservation: dayReservation,
                //showDayReservation: showDayReservation,
                dayBooking: dayBooking,
                //showDayBooking: showDayBooking,
                dayOrder: dayOrder,
                //showDayOrder: showDayOrder,
                daySell: daySell,
                //showDaySell: showDaySell,
                dayRetrieve: dayRetrieve,
                //showDayRetrieve: showDayRetrieve,
                status: status,
                note: note,
                seller: seller,
                saleUnit: saleUnit,
                gioihanyeucaulock: gioihanyeucaulock,
                gioihanlockthanhcong: gioihanlockthanhcong,
                yeucaucoc: yeucaucoc
            },
            dataType: 'json',
            success: function(data) {
                if (data.success == 1) {
                    $('#closeModalApartment').click();
                    switch (status) {
                        case '0':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aEmpty');
                            break;
                        case '1':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aNormal');
                            break;
                        case '2':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aBooking');
                            break;
                        case '3':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aReservation');
                            break;
                        case '4':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aOrder');
                            break;
                        case '5':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aSell');
                            break;
                        case '6':
                            $('#' + apartment).removeAttr('class').attr('class', 'changeSttApartment aRetrieve');
                            break;
                    }
                }
            }
        });
    });

    $('.changeSttApartment').click(function(e) {
        if (e.target == this) {
            var me = $(this);
            var apartment = me.attr('id');
            //var building = $('#list-apartment').attr('data-building');
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'changeStatusApartment',
                    apartment: apartment,
                    //building: building
                },
                dataType: 'json',
                success: function(data) {
                    if (data.success == 0) {
                        alert(data.alert);
                    } else {
                        if (data.status == 0) {
                            me.removeClass('aRetrieve').addClass('aEmpty');
                        } else if (data.status == 1) {
                            me.removeClass('aEmpty').addClass('aNormal');
                        } else if (data.status == 2) {
                            me.removeClass('aNormal').addClass('aBooking');
                        } else if (data.status == 3) {
                            me.removeClass('aBooking').addClass('aReservation');
                        } else if (data.status == 4) {
                            me.removeClass('aReservation').addClass('aOrder');
                        } else if (data.status == 5) {
                            me.removeClass('aOrder').addClass('aSell');
                        } else if (data.status == 6) {
                            me.removeClass('aSell').addClass('aRetrieve');
                        }
                    }
                }
            });
        };
    });
    if ($("#fixTable").length) {
        $("#fixTable").tableHeadFixer({
            head: true,
            left: 1,
        });
    }


    if ($('.iframe-btn').length) {
        $('.iframe-btn').fancybox({
            'width': 900,
            'height': 768,
            'type': 'iframe',
            'autoDimensions': false,
            'autoSize': false,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            helpers: {
                overlay: {
                    locked: false
                }
            },
            'afterClose': function() {
                var $self = $(this.element);
                var url = $self.closest('div').find('.urlHide').val();
                $self.closest('div').find('.imgUpload').attr('src', url);

                if ($self.closest('div').hasClass('block-img')) {
                    $self.closest('div').find('.delete-img').remove();
                    $self.after('<a class="btn btn-danger delete-img" type="button">Xóa ảnh</a>');
                }
                if ($self.closest('div').hasClass('block-img-section')) {
                    $self.closest('div').find('.delete-img-section').remove();
                    $self.after('<a class="btn btn-danger delete-img-section" type="button">Xóa ảnh</a>');
                    if ($('.section').length) {
                        var indexSection = $self.closest('.section').attr('sectionnumber');
                        if ($self.closest('div').find('.captionImg').length < 1) {
                            $self.closest('div').find('.imgUpload').after('<textarea class="captionImg" placeholder="Mô tả ảnh" rows="3" name="sectionText[' + indexSection + '][]"></textarea>');
                        }
                    }
                }

                if ($self.closest('section').hasClass('hascaptionImg')) {
                    var textId = $self.closest('section').attr('id');
                    var title = 'title';
                    if ($self.closest('div').find('.captionImg').length < 1) {
                        $self.closest('div').find('.imgUpload').after('<textarea class="captionImg"placeholder="Mô tả ảnh" rows="3" name="' + textId + '[' + title + '][]"></textarea>');
                    }
                }
            }
        });
    }
    if ($('.iframe-btn_en').length) {
        $('.iframe-btn_en').fancybox({
            'width': 900,
            'height': 768,
            'type': 'iframe',
            'autoDimensions': false,
            'autoSize': false,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            helpers: {
                overlay: {
                    locked: false
                }
            },
            'afterClose': function() {
                var $self = $(this.element);
                var url = $self.closest('div').find('.urlHide').val();
                $self.closest('div').find('.imgUpload').attr('src', url);

                if ($self.closest('div').hasClass('block-img')) {
                    $self.closest('div').find('.delete-img').remove();
                    $self.after('<a class="btn btn-danger delete-img" type="button">Xóa ảnh</a>');
                }
                if ($self.closest('div').hasClass('block-img-section')) {
                    $self.closest('div').find('.delete-img-section').remove();
                    $self.after('<a class="btn btn-danger delete-img-section" type="button">Xóa ảnh</a>');
                    if ($('.section').length) {
                        var indexSection = $self.closest('.section').attr('sectionnumber');
                        if ($self.closest('div').find('.captionImg').length < 1) {
                            $self.closest('div').find('.imgUpload').after('<textarea class="captionImg" placeholder="Mô tả ảnh" rows="3" name="sectionText_en[' + indexSection + '][]"></textarea>');
                        }
                    }
                }

                if ($self.closest('section').hasClass('hascaptionImg')) {
                    var textId = $self.closest('section').attr('id');
                    var title = 'title';
                    if ($self.closest('div').find('.captionImg').length < 1) {
                        $self.closest('div').find('.imgUpload').after('<textarea class="captionImg"placeholder="Mô tả ảnh" rows="3" name="' + textId + '[' + title + '][]"></textarea>');
                    }
                }
            }
        });
    }

    $(document).on("click", ".delete-img", function() {
        var parent = $(this).closest('.block-img');
        if ($(this).closest('section').find('.block-img').length == 1) {
            $(this).remove();
            parent.find('.imgUpload').attr('src', '');
            parent.find('.urlHide').val('');
        } else parent.remove();
    });

    $(document).on("click", ".delete-img-section", function() {
        var parentDiv = $(this).closest('.block-img-section');
        var parentSection = $(this).closest('.section');
        //var sectionParent = parent.closest('.section');
        if (parentSection.find('.block-img-section').length == 1) {
            $(this).remove();
            parentDiv.find('.imgUpload').attr('src', '');
            parentDiv.find('.urlHide').val('');
            parentDiv.find('.captionImg').remove();
        } else parentDiv.remove();
    });
    $(document).on("click", ".delete-img-section_en", function() {
        var parentDiv = $(this).closest('.block-img-section_en');
        var parentSection = $(this).closest('.section_en');
        //var sectionParent = parent.closest('.section');
        if (parentSection.find('.block-img-section_en').length == 1) {
            $(this).remove();
            parentDiv.find('.imgUpload_en').attr('src', '');
            parentDiv.find('.urlHide_en').val('');
            parentDiv.find('.captionImg_en').remove();
        } else parentDiv.remove();
    });

    if ($('.tinymce').length) {
        function applyMCE() {
            tinyMCE.init({
                mode: "textareas",
                editor_selector: "tinymce",
                theme: "modern",
                width: '100%',
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code fullscreen | fontsizeselect",
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                image_advtab: true,
                relative_urls: false,
                remove_script_host: false,

                forced_root_block: "",
                force_br_newlines: false,
                force_p_newlines: true,
                entity_encoding: "raw",
                //paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark",
                paste_retain_style_properties: "all",
                formats: {
                    bold: {
                        inline: 'b'
                    },
                    italic: {
                        inline: 'i'
                    }
                },
                external_filemanager_path: "/public/filemanager/",
                filemanager_title: "Responsive Filemanager",
                external_plugins: {
                    "filemanager": "/public/filemanager/plugin.min.js"
                }
            });
        }

        function AddRemoveTinyMce(editorId) {
            if (tinyMCE.get(editorId)) {
                tinyMCE.EditorManager.execCommand('mceFocus', false, editorId);
                tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, editorId);
            } else {
                tinymce.EditorManager.execCommand('mceAddEditor', false, editorId);
            }
        }

        applyMCE();
    }
    if ($('.tinymceApartment').length) {
        function applyMCE() {
            tinyMCE.init({
                mode: "textareas",
                editor_selector: "tinymceApartment",
                theme: "modern",
                width: '98%',
                height: 150,
                plugins: [
                    "advlist autolink link lists",
                    "searchreplace   ",
                    "directionality paste "
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist",
                toolbar2: "link unlink anchor | fontsizeselect",
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                image_advtab: true,
                relative_urls: false,
                remove_script_host: false,

                forced_root_block: "",
                force_br_newlines: false,
                force_p_newlines: true,
                entity_encoding: "raw",
                formats: {
                    bold: {
                        inline: 'b'
                    },
                    italic: {
                        inline: 'i'
                    }
                },
            });
        }

        function AddRemoveTinyMce(editorId) {
            if (tinyMCE.get(editorId)) {
                tinyMCE.EditorManager.execCommand('mceFocus', false, editorId);
                tinyMCE.EditorManager.execCommand('mceRemoveEditor', true, editorId);
            } else {
                tinymce.EditorManager.execCommand('mceAddEditor', false, editorId);
            }
        }

        applyMCE();
    }

    /////Định dạng ô money////
    $(".money").keyup(function() {
        var num = $(this).val();
        if (/\D/g.test(num)) num = num.replace(/\D/g, '');
        var i = 0,
            strLength = num.length;
        for (i; i < strLength; i++) {
            num = num.replace(' ', '');
        }

        $(this).val(GLOBAL_JS.pad(num));
    });

    $('.showPopupImgCustomer').click(function() {
        var idBooking = $(this).closest('tr').attr('id');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'showPopupImgCustomer',
                idBooking: idBooking
            },
            dataType: 'json',
            success: function(arrImg) {
                if (arrImg.length > 0) {
                    $('#popupCustomerImg .carousel-inner').html('');
                    $.each(arrImg, function(index, img) {
                        var strActive = '';
                        if (index == 0) {
                            strActive = 'active';
                        }
                        $('#popupCustomerImg .carousel-inner').append('<div class="item ' + strActive + '">\n' +
                            '                            <a target="_blank" href="' + img + '">\n' +
                            '                                <img class="img-responsive" src="' + img + '" alt="...">\n' +
                            '                            </a>\n' +
                            '                        </div>');
                    });
                    $('#popupCustomerImg').modal();
                }
            }
        });

    });

    ///Gọi popup điền comment khi QLSP yêu cầu QLS duyệt hoặc khi QLS đồng ý/ từ chối///
    $('.callPopupComment').click(function() {
        var field = $(this).attr('data-field');
        var status = $(this).attr('data-status');
        var id = $(this).attr('data-id');
        $('#popupMsg #msg').val('');
        $('#popupMsg #sendMsg').attr({
            'data-field': field,
            'data-status': status,
            'data-id': id
        });
        $('#popupMsg').modal();
    });

    ///Send yêu cầu cho QLS duyệt hoặc QLS đồng ý/ từ chối yêu cầu duyệt từ QLSP//
    $('#sendMsg').click(function() {
        var msg = $('#popupMsg #msg').val();
        if (msg == '') {
            alert('Bạn cần nhập nội dung!');
            return false;
        }
        if (confirm("Bạn muốn gửi yêu cầu duyệt Lock căn này tới quản lý sàn?")) {
            var idBooking = $(this).attr('data-id');
            var field = $(this).attr('data-field');
            var status = $(this).attr('data-status');
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'sendMsg',
                    idBooking: idBooking,
                    field: field,
                    status: status,
                    msg: msg
                },
                dataType: 'json',
                success: function(data) {
                    alert(data.alert)
                    if (data.success == 1) {
                        window.location = window.location.href;
                    }
                }
            });
        }
    });

    // $('.datepicker').datetimepicker({
    //     format: 'DD-MM-YYYY'
    // });
    $("#datepickerFromTime").on("dp.change", function(e) {
        $('#datepickerToTime').data("DateTimePicker").minDate(e.date);
    });
    $("#datepickerToTime").on("dp.change", function(e) {
        $('#datepickerFromTime').data("DateTimePicker").maxDate(e.date);
    });

    function numberFormat(number, thousand_separator) {
        var number_string = number.toString();
        var rest = number_string.length % 3;
        var result = number_string.substr(0, rest);
        var thousands = number_string.substr(rest).match(/\d{3}/gi);
        if (thousands) {
            var separator = rest ? thousand_separator : '';
            result += separator + thousands.join(thousand_separator);
        }
        return result;
    }

    $('.callPopupDetaiReport').click(function() {
        var time = $(this).attr('data-time');
        var mode = $(this).attr('data-mode');
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'getDetailReport',
                time: time,
                mode: mode,
                id: id
            },
            dataType: 'json',
            success: function(data) {
                var html = '<div class="table-responsive">\n' +
                    '                        <table class="table mb-0">\n' +
                    '                            <thead>\n' +
                    '                            <tr class="success">\n' +
                    '                                <th>Dự án</th>\n' +
                    '                                <th>Tổng giao dịch</th>\n' +
                    '                            </tr>\n' +
                    '                            </thead>\n' +
                    '                            <tbody>';
                if (mode == 'project') {
                    html = '<div class="table-responsive">\n' +
                        '                        <table class="table mb-0">\n' +
                        '                            <thead>\n' +
                        '                            <tr class="success">\n' +
                        '                                <th>Sàn bán</th>\n' +
                        '                                <th>Tổng giao dịch</th>\n' +
                        '                            </tr>\n' +
                        '                            </thead>\n' +
                        '                            <tbody>';
                }
                $.each(data, function(index, item) {
                    html += '<tr >\n' +
                        '                                    <td>' + item._id.itemName + '</td>\n' +
                        '                                    <td>' + item.total + '</td>\n' +
                        '                                </tr>';
                });
                html += '</tbody>\n' +
                    '                        </table>\n' +
                    '                    </div>';
                $('#popupDetaiReport #detailReport').html(html);
                $('#popupDetaiReport').modal();
            }
        });
    });

});