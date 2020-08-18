var GLOBAL_JS = {
    b_fValidateEmpty: function(e) {
        var t = /^ *$/;
        if (e == "" || t.test(e)) {
            return true;
        }
        return false;
    },
    b_fCheckEmail: function(e) {
        var t = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        return t.test(e)
    },

    b_fCheckMinLength: function(e, the_i_Length) {
        if (e.length < the_i_Length) {
            return false;
        }
        return true;
    },
    b_fCheckMaxLength: function(e, the_i_Length) {
        if (e.length > the_i_Length) {
            return false;
        }
        return true;
    },
    b_fCheckConfirmPwd: function(e, t) {
        if (e == t) {
            return true;
        }
        return false;
    },

    pad: function(num) {
        var str = num.toString().split('.');
        if (str[0].length >= 4) {
            str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1 ');
        }
        return (str.join('.'));
    }
};

jQuery(document).ready(function($) {
    var t = $(location).attr("href");
    sz_CurrentHost = t.split("/")[0] + "//" + t.split("/")[2];
    sz_CurrentPacth = t.split("/")[3];
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.ContentScrollup').fadeIn();
            $('.scrollup').fadeIn();
        } else {
            $('.ContentScrollup').fadeOut();
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    var windowPos = $(window).scrollTop();
    if (windowPos > 600) {
        $('.dx_menu_detail_bg').addClass('dx_menu_detail_bg_scroll');
        var hash = location.hash.substr(1);
        if (hash != '') {
            var pos = $('#' + hash).offset().top - 120;
            $('html, body').animate({
                scrollTop: pos
            }, 400, function() {
                // Add hash (#) to URL when done scrolling (default click behavior)
                //window.location.hash = hash;
            });
        }
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 600) {
            $('.dx_menu_detail_bg').addClass('dx_menu_detail_bg_scroll')
        } else {
            $('.dx_menu_detail_bg').removeClass('dx_menu_detail_bg_scroll')
        }
    });

    $('#dx_top').click(function(event) {
        event.preventDefault();
        $('body').animate({
            'scrollTop': '0px'
        }, 800)
    });

    if (window.innerWidth < 760) {
        var count = 0;
        $(".dx_menu_detail a").on('click', function(event) {
            // Prevent default anchor click behavior
            //event.preventDefault();
            // Store hash
            var hash = this.hash;
            if ($('.dx_menu_detail_bg').hasClass('dx_menu_detail_bg_scroll')) {
                // if(count == 0){
                //     var pos = $(hash).offset().top - 195;
                // }
                var pos = $(hash).offset().top - 150;
            } else {
                var pos = $(hash).offset().top - 235;
            }

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: pos
            }, 400, function() {
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
            count++;
        });
    } else {
        $(".dx_menu_detail a").on('click', function(event) {
            // Prevent default anchor click behavior
            //event.preventDefault();
            // Store hash
            var hash = this.hash;
            if ($('.dx_menu_detail_bg').hasClass('dx_menu_detail_bg_scroll')) {
                var pos = $(hash).offset().top - 120;
            } else {
                var pos = $(hash).offset().top - 172;
            }

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: pos
            }, 400, function() {
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        });
    }

    if (window.innerWidth >= 1024) {
        if ($('.related_new').length) {
            var element = $('.related_new'),
                originalY = element.offset().top;

            // Space between element and top of screen (when scrolling)
            var topMargin = -250;
            // Should probably be set in CSS; but here just for emphasis
            element.css('position', 'relative');
            $(window).on('scroll', function(event) {
                var scrollTop = $(window).scrollTop();
                var x = scrollTop - originalY + topMargin;
                if (scrollTop > 1900) {
                    var offsetTop = $('.related_new').offset().top;
                    var height = $('.related_new').height();
                    var total = height + offsetTop;
                    var offsetBottom = $('.addthis_inline_share_toolbox').offset().top;
                    if (offsetBottom - total > 150) {
                        element.stop(false, false).animate({
                            top: x < 0 ? 0 : x
                        }, 300);
                    } else {
                        if (offsetTop - scrollTop > 200) {
                            console.log(scrollTop + ',' + offsetTop);
                            element.stop(false, false).animate({
                                top: x < 0 ? 0 : x
                            }, 300);
                        }
                    }
                } else {
                    element.stop(false, false).animate({
                        top: 0
                    }, 300);
                }
            });
        }
    }

    $(".video-change").click(function() {
        var iframe = $(this).attr('alt');
        $('.frameClass').html(iframe);
    });

    // $('.call-popup-booking').click(function () {
    //      // alert('form thong tin can ho');
    //     var apartment = $(this).attr('data-apartment');
    //     $.ajax({
    //         type: 'post',
    //         url: sz_CurrentHost + '/api/common',
    //         data: {
    //             func: 'loadInfoPopupApartment',
    //             apartment: apartment
    //         },
    //         dataType: 'json',
    //         success: function (data) {
    //             var apart = data.apartment;
    //             var textHeartWall = apart.price.heartWall != '' && apart.price.heartWall != 0 && apart.price.heartWall != null? apart.price.heartWall +' VNĐ': 'Đang cập nhật' ;
    //             var textWaterWall = apart.price.waterWall != '' && apart.price.waterWall != 0 && apart.price.heartWall != null ? apart.price.waterWall +' VNĐ': 'Đang cập nhật' ;
    //             var textTotal = apart.price.total != '' && apart.price.total != 0 && apart.price.heartWall != null ? apart.price.total +' VNĐ': 'Đang cập nhật' ;
    //             var textTotalMin = apart.price.totalMin != '' && apart.price.totalMin != 0 && apart.price.heartWall != null ? apart.price.totalMin +' VNĐ': 'Đang cập nhật' ;
    //             var textTotalMax = apart.price.totalMax != '' && apart.price.totalMax != 0 && apart.price.heartWall != null ? apart.price.totalMax +' VNĐ': 'Đang cập nhật' ;
    //             var textNote = apart.note != '' && apart.note != null ? apart.note : '';
    //             $('#popupBooking #numberApartment').text(apart.name);
    //             $('#popupBooking #codeApartment').text(apart.code);
    //             $('#popupBooking #priceHeartWall').text(textHeartWall);
    //             $('#popupBooking #priceWaterWall').text(textWaterWall);
    //             $('#popupBooking #priceApartment').text(textTotal);
    //             $('#popupBooking #priceApartmentMin').text(textTotalMin);
    //             $('#popupBooking #priceApartmentMax').text(textTotalMax);
    //             $('#popupBooking #note').text(textNote);
    //
    //             var status = apart.status;
    //             if(status == 1){
    //                 $('#popupBooking .redirect-info-booking').text('Còn trống').prop('disabled', true);
    //             }else if(status == 2){
    //                 $('#popupBooking .redirect-info-booking').text('Đã giữ chỗ').prop('disabled', true);
    //             }else if(status == 3){
    //                 $('#popupBooking .redirect-info-booking').text('Đã đặt chỗ').prop('disabled', true);
    //             }else if(status == 4){
    //                 $('#popupBooking .redirect-info-booking').text('Đã đặt mua').prop('disabled', true);
    //             }else if(status == 5){
    //                 $('#popupBooking .redirect-info-booking').text('Đã mua').prop('disabled', true);
    //             }else if(status == 6){
    //                 $('#popupBooking .redirect-info-booking').text('Chủ đầu tư thu hồi').prop('disabled', true);
    //             }
    //             if(status != 1){
    //                 $("#popupBooking").modal();
    //             }else{
    //                 $("#popup-dat-cho").modal();
    //             }
    //         }
    //     });
    // });
    $('.call-popup-booking').click(function() {
        var apartment = $(this).attr('data-apartment');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadInfoPopupApartment',
                apartment: apartment
            },
            dataType: 'json',
            success: function(data) {
                var apart = data.apartment;
                var textHeartWall = apart.price.heartWall != '' && apart.price.heartWall != 0 && apart.price.heartWall != null ? apart.price.heartWall + ' VNĐ' : 'Đang cập nhật';
                var textWaterWall = apart.price.waterWall != '' && apart.price.waterWall != 0 && apart.price.heartWall != null ? apart.price.waterWall + ' VNĐ' : 'Đang cập nhật';
                var textTotal = apart.price.total != '' && apart.price.total != 0 && apart.price.heartWall != null ? apart.price.total + ' VNĐ' : 'Đang cập nhật';
                // var textTotalMin = apart.price.totalMin != '' && apart.price.totalMin != 0 && apart.price.heartWall != null ? apart.price.totalMin +' VNĐ': 'Đang cập nhật' ;
                // var textTotalMax = apart.price.totalMax != '' && apart.price.totalMax != 0 && apart.price.heartWall != null ? apart.price.totalMax +' VNĐ': 'Đang cập nhật' ;
                var textNote = apart.note != '' && apart.note != null ? apart.note : '';
                var productManager = apart.productManager.length > 0 ? apart.productManager[0].name : '';
                var hotlineProductManager = apart.productManager.length > 0 ? apart.productManager[0].hotline : '';
                var directionDoor = apart.directionDoor != null && apart.directionDoor != '' ? apart.directionDoor : 'Đang cập nhật';
                var directionBalcony = apart.directionBalcony != null && apart.directionBalcony != '' ? apart.directionBalcony : 'Đang cập nhật';
                var bedroom = apart.bedroom != null && apart.bedroom != '' ? apart.bedroom : 'Đang cập nhật';
                var gioihanyeucaulock = apart.gioihanyeucaulock != null && apart.gioihanyeucaulock != '' ? apart.gioihanyeucaulock : 'Đang cập nhật';
                var songuoiyeucaulock = apart.songuoiyeucaulock != null && apart.songuoiyeucaulock != '' ? apart.songuoiyeucaulock : '0';
                var gioihanlockthanhcong = apart.gioihanlockthanhcong != null && apart.gioihanlockthanhcong != '' ? apart.gioihanlockthanhcong : 'Đang cập nhật';
                var songuoilockthanhcong = apart.songuoilockthanhcong != null && apart.songuoilockthanhcong != '' ? apart.songuoilockthanhcong : '0';

                $('#popupBooking #floor').text(apart.floor);
                $('#popupBooking #codeApartment').text(apart.code);
                $('#popupBooking #priceHeartWall').text(textHeartWall);
                $('#popupBooking #priceWaterWall').text(textWaterWall);
                $('#popupBooking #priceApartment').text(textTotal);
                // $('#popupBooking #priceApartmentMin').text(textTotalMin);
                // $('#popupBooking #priceApartmentMax').text(textTotalMax);

                $('#popupBooking #directionDoor').text(directionDoor);
                $('#popupBooking #directionBalcony').text(directionBalcony);
                $('#popupBooking #bedroom').text(bedroom);
                $('#popupBooking #gioihanyeucaulock').text(gioihanyeucaulock);
                $('#popupBooking #songuoiyeucaulock').text(songuoiyeucaulock);
                $('#popupBooking #gioihanlockthanhcong').text(gioihanlockthanhcong);
                $('#popupBooking #songuoilockthanhcong').text(songuoilockthanhcong);
                $('#popupBooking #productManager').text(productManager);
                $('#popupBooking #hotlineProductManager').text(hotlineProductManager);
                $('#popupBooking #note').text(textNote);


                $('#listYeucauLock').html('<li class="list-group-item list-group-item-warning"><strong>DANH SÁCH CHỜ DUYỆT LOCK:</strong></li>');
                $('#listLockthanhcong').html('<li class="list-group-item list-group-item-warning"><strong>DANH SÁCH ĐÃ LOCK THÀNH CÔNG:</strong></li>');
                if (apart.arrYeucaulock.length > 0) {
                    var htmlYeucaulock = '';
                    $.each(apart.arrYeucaulock, function(i, item) {
                        htmlYeucaulock += '<li class="list-group-item list-group-item-warning">';
                        htmlYeucaulock += '<strong>' + item.name + ' - ' + item.departmentName + '</strong>';
                        htmlYeucaulock += '</li>';
                    });
                    $('#listYeucauLock').append(htmlYeucaulock);
                }

                if (apart.arrLockthanhcong.length > 0) {
                    var htmlLockthanhcong = '';
                    $.each(apart.arrLockthanhcong, function(i, item) {
                        htmlLockthanhcong += '<li class="list-group-item list-group-item-warning">';
                        htmlLockthanhcong += '<strong>' + item.name + ' - ' + item.departmentName + '</strong>';
                        htmlLockthanhcong += '</li>';
                    });
                    $('#listLockthanhcong').append(htmlLockthanhcong);
                }
                var status = apart.status;
                if (status == 1) {
                    $('#popupBooking .redirect-info-booking').text('Còn trống').prop('disabled', true);
                } else if (status == 2) {
                    $('#popupBooking .redirect-info-booking').text('Đã giữ chỗ').prop('disabled', true);
                } else if (status == 3) {
                    $('#popupBooking .redirect-info-booking').text('Đã đặt chỗ').prop('disabled', true);
                } else if (status == 4) {
                    $('#popupBooking .redirect-info-booking').text('Đã đặt mua').prop('disabled', true);
                } else if (status == 5) {
                    $('#popupBooking .redirect-info-booking').text('Đã mua').prop('disabled', true);
                } else if (status == 6) {
                    $('#popupBooking .redirect-info-booking').text('Chủ đầu tư thu hồi').prop('disabled', true);
                }

                $("#popupBooking .modal-footer").html('');
                if (data.allowLockBtn == true) {
                    $("#popupBooking .modal-footer").html('<button type="button" class="btn btn-danger" id="requestLock" data-apartment="' + apart._id.$id + '">Yêu cầu Lock</button>');
                }

                $("#popupBooking").modal();
            }
        });
    });

    $(document).on("click", "#requestLock", function() {

        if (confirm("Bạn muốn gửi yêu cầu Lock căn này?")) {
            var idApartment = $(this).attr('data-apartment');
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'requestLock',
                    apartment: idApartment
                },
                dataType: 'json',
                success: function(data) {
                    alert(data.alert);
                    if (data.success == 1) {
                        $('#popupBooking').modal('hide');
                    }
                }
            });
        }
    });
    //Hàm set Time sau một khoảng tg sẽ off form đăng ký căn hộ ///
    var autoOffPopupBooking = function(time) {
        //Tự động off popup đăng ký book căn khi quá hạn thời gian///
        var counter = time;
        window.timer = setInterval(function() {
            $("#coundownTime span").html(--counter);
            if (counter == 0) {
                $('#huy-dat-cho').click();
                clearInterval(window.timer);
            }
        }, 1000);
    };

    // var off = function (time) {
    //     var totalTime = time;
    //     window.setInterval(function () {
    //         var timeCounter = totalTime;
    //         var updateTime = eval(timeCounter) - eval(1);
    //         $("#coundownTime span").html(updateTime);
    //         totalTime = updateTime;
    //         if (updateTime == 0) {
    //             $('#huy-dat-cho').click();
    //             clearInterval(timer);
    //         }
    //     }, 1000);
    //
    // };


    // $('#popup-dat-cho').on('show.bs.modal', function(){
    //     var myModal = $(this);
    //     var time = myModal.attr('data-time');
    //     clearTimeout(myModal.data('hideInterval'));
    //     myModal.data('hideInterval', setTimeout(function(){
    //         myModal.modal('hid' +
    //             'e');
    //     }, time));
    // });

    //Khi hủy bỏ form đặt chỗ-> update lại trạng thái căn hộ nếu kiểu bật là 1///
    //     $('#popup-dat-cho').on('hide.bs.modal', function () {
    //         clearInterval(window.timer);
    //         var type = $('#popup-dat-cho').attr('type-open');
    //         if(type == 1){
    //             var apartment = $('#popup-dat-cho').attr('data-apartment');
    //             $.ajax({
    //                 type: 'post',
    //                 url: sz_CurrentHost + '/api/common',
    //                 data: {
    //                     func: 'huybodatcho',
    //                     apartment: apartment
    //                     // type: type
    //                 },
    //                 dataType: 'json',
    //                 success: function (res) {
    //                     if(res.success == 1) {
    //                         if(res.apartment.status == 1){
    //                             $('td[data-apartment="'+apartment+'"]').removeAttr('class').attr('class','changeSttApartment aNormal');
    //                         }
    //                         $('#popup-dat-cho').removeAttr('type-open');
    //                     }else alert(res.alert);
    //                 }
    //             });
    //         }
    //     });

    ///////////Send info booking//////////
    $('.send-info-booking').click(function() {
        var name = $('#name').val();
        var passport = $('#passport').val();
        var passportCreate = $('#passportCreate').val();
        var passportPlace = $('#passportPlace').val();
        var detailAddress = $('#detailAddress').val();
        var phone = $('#cus-phone').val();
        var email = $('#email').val();
        var note = $('#note').val();
        var building = $('#building').val();
        var type = $('#apartmentType').val();
        var apartment = $('#apartment').val();
        var alias = $('#projectAlias').val();
        var orderMoney = $("#order-money option:selected").text();
        var arrData = {
            'name': name,
            'passport': passport,
            'passportCreate': passportCreate,
            'passportPlace': passportPlace,
            'detailAddress': detailAddress,
            'phone': phone,
            'email': email,
            'note': note,
            'building': building,
            'type': type,
            'apartment': apartment,
            'orderMoney': orderMoney
        }
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'sendInfoBooking',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                alert(data.alert);
                if (data.success != 0) {
                    window.location = sz_CurrentHost + '/dat-cho-can-ho/' + alias + '.html?building=' + building;
                }
            }
        });
    });

    ///////Load Apartment when change building////
    $('.change-building').change(function() {
        var building = $(this).val();
        var alias = $('#projectAlias').val();
        window.location = sz_CurrentHost + '/dat-cho-can-ho/' + alias + '.html?building=' + building;
    });

    /////////////Load areas dùng chung///////////
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
                    $(".chosen-select").trigger("chosen:updated");
                }
            });
        } else {
            $('#district').html(option);
        }
    });

    ///////Load areas khu vực ở box search trang chủ///////
    $('.load-areas-search').on('change', function(e) {
        var me = $(this);
        var parentId = me.val();
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
                    var $district = me.closest('form').find('.search-district');
                    $district.html(option).select2('destroy');
                    $district.select2();
                }
            });
        } else {
            $('#district').html(option);
        }
    });

    ///Click ẩn hiện box đăng ký nhận thông tin dự án///
    $('.click-up').click(function() {
        $('.show-error').addClass('hide');
        var parent = $(this).closest('.dx_submit_project');
        if (parent.hasClass('dx_submit_project_hide')) {
            var up = 1;
            parent.removeClass("dx_submit_project_hide", 500);
            $(this).switchClass("fa-chevron-up", "fa-chevron-down", 500, "easeInOutQuad");
        } else {
            var up = 0;
            parent.addClass("dx_submit_project_hide", 500);
            $(this).switchClass("fa-chevron-down", "fa-chevron-up", 500, "easeInOutQuad");
        }
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'statusFormRegisterProject',
                up: up
            },
            dataType: 'json',
            success: function(data) {}
        });
    });

    //Sau 5s thì tự ẩn box đăng ký nhận dự án////
    var sec = 5;
    var timer = setInterval(function() {
        sec--;
        if (sec == -1) {
            if ($('.dx_submit_project input:focus').length == 0) {
                if ($('.dx_submit_project').hasClass('dx_submit_project_hide')) {
                    return false;
                } else {
                    $('.dx_submit_project').addClass("dx_submit_project_hide", 500);
                    $('.click-up').switchClass("fa-chevron-down", "fa-chevron-up", 500, "easeInOutQuad");
                    $.ajax({
                        type: 'post',
                        url: sz_CurrentHost + '/api/common',
                        data: {
                            func: 'statusFormRegisterProject',
                            up: 0
                        },
                        dataType: 'json',
                        success: function(data) {}
                    });
                }
            }
            clearInterval(timer);
        }
    }, 1000);

    ///Trạng thái ẩn hiện form đăng ký nhận thông tin khi load trang/////
    $.ajax({
        type: 'post',
        url: sz_CurrentHost + '/api/common',
        data: {
            func: 'getStatusFormRegisterProject',
        },
        dataType: 'json',
        success: function(data) {
            if (data == 0) {
                $('.dx_submit_project').addClass("dx_submit_project_hide", 500);
                $('.click-up').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            } else {
                $('.dx_submit_project').removeClass("dx_submit_project_hide", 500);
                $('.click-up').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
        }
    });

    ////Click nút đăng ký box đăng ký nhận tin dự án ở dưới cùng chi tiết dự án///
    $('#send-register-project').click(function() {
        $('.has-error').removeClass('has-error has-feedback');
        var name = $('#reg-name').val();
        var email = $('#reg-email').val();
        var phone = $('#reg-phone').val();
        var project = $('#projectId').text();
        //var note = $('#reg-note').val();
        if (GLOBAL_JS.b_fValidateEmpty(name)) {
            $('.form_register_project #reg-name').closest('.form-group').addClass('has-error has-feedback');
            $('.form_register_project #reg-name').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#reg-name').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('.form_register_project #reg-email').closest('.form-group').addClass('has-error has-feedback');
            $('.form_register_project #reg-email').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#reg-email').focus();
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('.form_register_project #reg-email').closest('.form-group').addClass('has-error has-feedback');
            $('.form_register_project #reg-email').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#reg-email').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('.form_register_project #reg-phone').closest('.form-group').addClass('has-error has-feedback');
            $('.form_register_project #reg-phone').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#reg-phone').focus();
            return false;
        }
        if ($('#careProject').val() == '') {
            $('.form_register_project #careProject').closest('.form-group').addClass('has-error has-feedback');
            $('#careProject').focus();
            return false;
        }
        // if (GLOBAL_JS.b_fValidateEmpty(note)) {
        //     $('.dx_submit_project .show-error').removeClass('hide').text('Bạn cần nhập nội dung yêu cầu!');
        //     $('#reg-note').focus();
        //     return false;
        // }
        var arrData = {
            'name': name,
            'email': email,
            'phone': phone,
            'project': project,
            'url': window.location.href
            // 'note': note
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'sendRegisterProject',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                alert(data.alert);
                if (data.success == 1) {
                    $('.form_register_project form')[0].reset();
                    $('.has-error').removeClass('has-error has-feedback');
                    $.ajax({
                        type: 'post',
                        url: sz_CurrentHost + '/api/common',
                        data: {
                            func: 'sendEmailRegisterProject',
                            arrData: arrData
                        },
                        dataType: 'json',
                        success: function(data) {}
                    });
                }
            }
        });
    });

    ////Redirect khi click nút search ở trang chủ///
    $('.btn-home-search').click(function() {
        var parent = $(this).closest('form');
        var parentSearch = parent.attr('id');
        var childCat = parent.find('.search-child-cat').val();
        var city = parent.find('.search-city').val();
        var district = parent.find('.search-district').val();
        var name = parent.find('.search-name').val();
        var lang = $('.lang').val();
        //alert(parentSearch+'|'+childCat+'|'+city+'|'+district);
        var arrData = {
            'parentSearch': parentSearch,
            'childCat': childCat,
            'city': city,
            'district': district,
            'name': name,
            'lang': lang,
        };
        if ($('.search-price').length) {
            var price = parent.find('.search-price').val();
            arrData['price'] = price;
        }
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'redirectHomeSearch',
                arrData: arrData
            },
            dataType: 'json',
            success: function(url) {
                if (url != '') window.location = sz_CurrentHost + '/' + url;
            }
        });
    });

    ////Form đăng ký download tài liệu trong chi tiết dự án///
    $('.downloadProject').click(function() {
        var me = $(this);
        var parent = me.closest('div');
        var type = me.attr('data-type');
        var projectId = me.attr('data-project');
        var phone = parent.find('#phone-reg').val();
        var email = parent.find('#email-reg').val();

        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('.err-downloadProject').removeClass('hide').text('Bạn cần nhập số điện thoại');
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('.err-downloadProject').removeClass('hide').text('Bạn cần nhập Email');
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('.err-downloadProject').removeClass('hide').text('Email chưa đúng định dạng');
            return false;
        }
        var arrData = {
            'type': type,
            'projectId': projectId,
            'phone': phone,
            'email': email
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'downloadProject',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                if (data.success == 1) {
                    //if (type == 'sell') {
                    parent.find('#phone-reg').val('');
                    parent.find('#email-reg').val('');
                    //}
                    parent.find('.err-downloadProject').addClass('hide');
                    //window.location = data.url;
                    arrData['typeDownload'] = 'project';
                    window.open(data.url);
                    $.ajax({
                        type: 'post',
                        url: sz_CurrentHost + '/api/common',
                        data: {
                            func: 'sendEmailDownload',
                            arrData: arrData
                        },
                        dataType: 'json',
                        success: function(data) {

                        }
                    });
                }
            }
        });
    });

    ////Form đăng ký download tài liệu trong chi tiết dự án///
    $('.downloadNew').click(function() {
        var me = $(this);
        var parent = me.closest('div');
        var newId = me.attr('data-new');
        var phone = parent.find('#phone-reg').val();
        var email = parent.find('#email-reg').val();

        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('.err-downloadNew').removeClass('hide').text('Bạn cần nhập số điện thoại');
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('.err-downloadNew').removeClass('hide').text('Bạn cần nhập Email');
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('.err-downloadNew').removeClass('hide').text('Email chưa đúng định dạng');
            return false;
        }
        var arrData = {
            'newId': newId,
            'phone': phone,
            'email': email
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'downloadNew',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                if (data.success == 1) {
                    //if (type == 'sell') {
                    parent.find('#phone-reg').val('');
                    parent.find('#email-reg').val('');
                    //}
                    parent.find('.err-downloadNew').addClass('hide');
                    //window.location = data.url;
                    arrData['typeDownload'] = 'new';
                    window.open(data.url);
                    $.ajax({
                        type: 'post',
                        url: sz_CurrentHost + '/api/common',
                        data: {
                            func: 'sendEmailDownload',
                            arrData: arrData
                        },
                        dataType: 'json',
                        success: function(data) {

                        }
                    });
                }
            }
        });
    });

    ////Form gửi thông tin khảo sát trong chi tiết dự án///
    $('#sm-survey').click(function() {
        var me = $(this);
        var id = me.attr('data-id');
        var name = $('#projectSurveyPopup #name').val();
        var address = $('#projectSurveyPopup #address').val();
        var phone = $('#projectSurveyPopup #phone').val();
        var email = $('#projectSurveyPopup #email').val();
        var passport = $('#projectSurveyPopup #passport').val();
        if (GLOBAL_JS.b_fValidateEmpty(name)) {
            $('#err-survey').removeClass('hide').text('Bạn cần nhập đầy đủ họ tên');
            $('#projectSurveyPopup #name').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(address)) {
            $('#err-survey').removeClass('hide').text('Bạn cần nhập địa chỉ chính xác');
            $('#projectSurveyPopup #address').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('#err-survey').removeClass('hide').text('Bạn cần nhập chính xác số điện thoại');
            $('#projectSurveyPopup #phone').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('#err-survey').removeClass('hide').text('Bạn cần nhập Email');
            $('#projectSurveyPopup #email').focus();
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('#err-survey').removeClass('hide').text('Email không đúng định dạng');
            $('#projectSurveyPopup #email').focus();
            return false;
        }
        if (!$("[type=radio]").is(':checked') || !$("[type=checkbox]").is(':checked')) {
            alert('Bạn nên tích chọn đầy đủ các tiêu chí được đưa ra để chúng tôi có thể hỗ trợ bạn tốt hơn!');
            return false;
        }
        var datastring = $("#survey-form").serializeArray();

        var arrData = {
            'projectId': id,
            'name': name,
            'address': address,
            'phone': phone,
            'email': email,
            'passport': passport,
            'detail': datastring
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'sendProjectSurvey',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                alert(data.alert);
                if (data.success == 1) {
                    $('#projectSurveyPopup').modal('hide');
                }
            }
        });
    });

    /////////Tính tiền lãi//////
    $('#pc-interest').click(function() {
        var money = $("#money").val();
        var i = 0,
            strLength = money.length;
        for (i; i < strLength; i++) {
            money = money.replace(' ', '');
        }

        var interest = $("#interest").val();
        var interest = interest / 100;
        var interest_type = $("#time").val();

        var deadline = $("#deadline").val();
        var deadline = deadline.replace(' ', '');
        var deadline_type = $("#time2").val();
        var type = $("#type").val();

        if (money == '' || interest == '' || deadline == '') {
            alert('Kiểm tra dữ liệu đầu vào!');
            return false;
        }
        if (isNaN(money) == true || isNaN(interest) == true || isNaN(deadline) == true) {
            alert('Kiểm tra dữ liệu đầu vào!');
            return false;
        }
        if (money < 0 || interest < 0 || deadline < 0) {
            alert('Kiểm tra dữ liệu đầu vào!');
            return false;
        }

        if (interest_type == 2) interest = interest / 12;
        if (deadline_type == 2) deadline = deadline * 12;

        var all_money_rest = money;
        var first_tr = '<tr class="number-total-money"><td>0</td><td>' + GLOBAL_JS.pad(Math.ceil(all_money_rest)) + '</td><td></td><td></td><td></td></tr>';
        $('#content-value').html(first_tr);

        if (type == 1) {
            //((A x (1+C/12)^B)-A)/B 1.1232016680838905  12.320166808389061
            var LVHT = ((money * Math.pow((1 + interest), deadline)) - money) / deadline; // lai vay hang thang
            var TGHT = money / deadline; //tien goc tra hang thang
            var TTHT = TGHT + LVHT; // tong tien hang thang
            for (i = 1; i <= deadline; i++) {
                var tr_content = '<tr class="number-total-money"><td>' + i + '</td><td>' + GLOBAL_JS.pad(Math.ceil((all_money_rest - TGHT))) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TGHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(LVHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TTHT)) + '</td></tr>';
                $('#content-value').append(tr_content);
                all_money_rest = all_money_rest - TGHT;
            }
            var All = LVHT * deadline + parseInt(money);
            var TLV = LVHT * deadline;
        } else if (type == 2) {
            //A x C / 12
            var LVHT = money * interest; // lai vay hang thang
            var TGHT = money / deadline; //tien goc tra hang thang
            var TTHT = TGHT + LVHT; // tong tien hang thang
            for (i = 1; i <= deadline; i++) {
                var tr_content = '<tr class="number-total-money"><td>' + i + '</td><td>' + GLOBAL_JS.pad(Math.ceil((all_money_rest - TGHT))) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TGHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(LVHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TTHT)) + '</td></tr>';
                $('#content-value').append(tr_content);
                all_money_rest = all_money_rest - TGHT;
            }
            var All = LVHT * deadline + parseInt(money);
            var TLV = LVHT * deadline;
        } else if (type == 3) {
            var TGHT = money / deadline; //tien goc tra hang thang
            var TLV = 0;
            for (i = 1; i <= deadline; i++) {
                var LVHT = (money - TGHT * (i - 1)) * interest; // lai vay hang thang
                var TTHT = TGHT + LVHT; // tong tien hang thang
                TLV = TLV + LVHT;
                var tr_content = '<tr class="number-total-money"><td>' + i + '</td><td>' + GLOBAL_JS.pad(Math.ceil((all_money_rest - TGHT))) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TGHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(LVHT)) + '</td><td>' + GLOBAL_JS.pad(Math.ceil(TTHT)) + '</td></tr>';
                $('#content-value').append(tr_content);
                all_money_rest = all_money_rest - TGHT;
            }
            var All = TLV + parseInt(money);
        }

        $('.before-money').html(GLOBAL_JS.pad(Math.ceil(money)) + ' VNĐ');
        $('.all-money').html(GLOBAL_JS.pad(Math.ceil(All)) + ' VNĐ');
        $('.all-interest').html(GLOBAL_JS.pad(Math.ceil(TLV)) + ' VNĐ');
        $("#caculated").modal();
    });

    /////Xử lý tab phần tư vấn nội thất///
    var display = 10; /// Số phần tử xuất hiện ban đầu của mỗi tab
    var jump = 5; ///Bc nhảy xuất hiện các phần tử
    $('.all').addClass('hide');
    $('.all:lt(' + display + ')').removeClass('hide');
    $('.change-consult[id="all"]').addClass('active');

    var arrElementTab = {}; //Mảng lưu trữ các phần tử đã hiển thị của các tab///
    ////Gán mặc dịnh cho mỗi tab load 2 phần tử////
    $(".change-consult").each(function() {
        var meId = $(this).attr('id');
        //$("."+meId+":not(.hide)").length;
        arrElementTab[meId] = display;
    });
    if (display >= $('.all').length) $('#show-more-consult').addClass('hide'); // Nếu số phần tử xuất hiện lớn hơn bằng tổng số phần tử tab tất cả thì ẩn nút xem thêm//

    ///Khi thay đổi tab, load phần tử của tab và vẫn giữ nguyên số phần tử đã xuất hiên //
    $('.change-consult').on('click', function() {
        $('.change-consult').removeClass('active');
        $(this).addClass('active');
        var meId = $(this).attr('id');
        $('.all').addClass('hide');
        var numberStartDisplay = arrElementTab[meId];
        $('.' + meId + ':lt(' + numberStartDisplay + ')').removeClass('hide');
        if (numberStartDisplay >= $('.' + meId).length) $('#show-more-consult').addClass('hide');
        else $('#show-more-consult').removeClass('hide');
    });

    ///Xử lý khi ấn nút xem thêm sẽ load các phần tử của tab ra///
    $('#show-more-consult').on('click', function() {
        var tabActive = $('#filterable-item-filter-1').find('.active');
        var meId = tabActive.attr('id');
        size = $('.' + meId).size();
        arrElementTab[meId] += jump;
        if (arrElementTab[meId] >= size) $(this).addClass('hide');
        //x = (x+1 <= size) ? x+1 : size;
        $('.' + meId + ':lt(' + arrElementTab[meId] + ')').removeClass('hide');
        if (arrElementTab[meId] >= size) $('#show-more-consult').addClass('hide');
    });

    ///Xử lý active tab các sàn trong liên hệ////
    if ($('.dx_contact_bg').length) {
        var url = window.location.href;
        var splitUrl = url.split('#');
        var tabContact = splitUrl[1];
        if (tabContact != undefined) {
            $('ul.dx_search_button_contact li.active').removeClass('active');
            $("a[href*='" + tabContact + "']").closest('li').addClass('active');
            $('.tab-content form').removeClass('active in');
            $('.tab-content .' + tabContact).addClass('active in');
        }
    }

    if ($('.check-detail-page').length) {
        window.onload = function() {
            var ImageMap = function(mapelement, img) {
                var n,
                    areas = mapelement.getElementsByTagName('area'),
                    len = areas.length,
                    coords = [],
                    previousWidth = 780;
                for (n = 0; n < len; n++) {
                    coords[n] = areas[n].coords.split(',');
                }
                this.resize = function() {
                    var n, m, clen,
                        x = img.offsetWidth / previousWidth;
                    for (n = 0; n < len; n++) {
                        clen = coords[n].length;
                        for (m = 0; m < clen; m++) {
                            coords[n][m] *= x;
                        }
                        areas[n].coords = coords[n].join(',');
                    }
                    previousWidth = document.body.clientWidth;
                    return true;
                };
                window.onresize = this.resize;
            };
            // execute in page detail
            $('img.map').each(function(index) {
                if ($('#map_ID' + index).length) {
                    imageMap = new ImageMap(document.getElementById('map_ID' + index), document.getElementById('img_ID' + index));
                    imageMap.resize();
                }
            });

            $('area.showPopupApartmentType').click(function() {
                var name = $(this).attr('title');
                var img = $(this).attr('data-img');
                $('#nameApartmentType').text(name);
                $('#imgApartmentType').attr('src', img);
                $('#popupApartmentType').modal();
            });

        }

        //Highlight Map
        //$('.map').maphilight();
        // responsive
    }

    var areas = document.getElementsByTagName('area');
    for (var index = 0; index < areas.length; index++) {
        areas[index].addEventListener('mouseover', function() {
            this.focus();
        }, false);
        areas[index].addEventListener('mouseout', function() {
            this.blur();
        }, false);
    };

    ///Xử lý active tab các sàn trong liên hệ////
    if ($('.dx_contact_bg').length) {
        var url = window.location.href;
        var splitUrl = url.split('#');
        var tabContact = splitUrl[1];
        if (tabContact != undefined) {
            $('ul.dx_search_button_contact li.active').removeClass('active');
            $("a[href*='" + tabContact + "']").closest('li').addClass('active');
            $('.tab-content form').removeClass('active in');
            $('.tab-content .' + tabContact).addClass('active in');
        }
    }

    ///Hàm set Time sau một khoảng tg sẽ off form đăng ký 1///
    var setTimeOnOff = function(time) {
        setTimeout(function() {
            if ($('#feedback form#feedback-content').hasClass('feedback-off')) {
                $("#feedback form#feedback-content").slideDown(500).removeClass('feedback-off').addClass('feedback-on');
                $("#feedback .up-down-icon").removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            }
        }, time);
    };

    ///Hàm set Time sau một khoảng tg sẽ off form đăng ký 2///
    var setTimeOnOffFeedback2 = function(time) {
        setTimeout(function() {
            $('#feedback-2').slideDown(300);
            $('#bg-body-registerPopup').addClass('modal-backdrop');
        }, time);
    };

    ///Nếu khách hàng chưa từng đăng ký thành công (dựa vào class "on") -  form dăng ký 1////
    if ($('#feedback').hasClass('on')) {
        ///Mặc định khi vào trang, mặc định ẩn form đăng ký, sau 10s mới hiện lên///
        ///Nhưng nếu khách chưa từng click ẩn form thì mới thực hiện quy tắc trên////
        if ($('#feedback #endTimeOnOff').length == 0) {
            //setTimeOnOff(10000);
            ///Nếu khách đã từng click ẩn form thì kiểm tra thời gian còn lại dựa vào session đã lưu///
        } else {
            var currentTime = eval($('#feedback #currentTime').text());
            var endTime = eval($('#feedback #endTimeOnOff').text());
            var totalTime = endTime - currentTime;
            if (totalTime > 0) {
                window.setInterval(function() {
                    var timeCounter = totalTime;
                    var updateTime = eval(timeCounter) - eval(1);
                    totalTime = updateTime;
                    if (updateTime == 0) {
                        $("#feedback form#feedback-content").slideDown(500).removeClass('feedback-on').addClass('feedback-off');
                        $("#feedback .up-down-icon").removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                    }
                }, 1000);
            } else {
                setTimeOnOff(10000);
            }
        }
    }

    ///Nếu khách hàng chưa từng đăng ký thành công (dựa vào class "on") - form dăng ký 2////
    if ($('#feedback-2').hasClass('on')) {
        ///Khi load trang, nếu chưa từng click ẩn form đăng ký 2, thì mặc định sau 180s sẽ hiện lên///
        if ($('#feedback-2 #endTimeOnOff').length == 0) {
            setTimeOnOffFeedback2(180000);
        }
        ///Nếu ít nhất 1 lần click ẩn form, sẽ kiểm tra thời gian còn lại để hiện form lên tiếp///
        else {
            var currentTime = eval($('#feedback-2 #currentTime').text());
            var endTime = eval($('#feedback-2 #endTimeOnOff').text());
            var totalTime = endTime - currentTime;
            if (totalTime > 0) {
                window.setInterval(function() {
                    var timeCounter = totalTime;
                    var updateTime = eval(timeCounter) - eval(1);
                    totalTime = updateTime;
                    if (updateTime == 0) {
                        $('#feedback-2').slideDown(300);
                    }
                }, 1000);
            } else {
                $('#feedback-2').slideDown(300);
            }
        }
    }

    ////Khi hiện form đăng ký, nếu khách hàng click ẩn đi, thì sẽ set time mặc định là 90s sẽ hiện tiếp///
    // $("#feedback #feedback-header").click(function () {
    //     if ($('#feedback form#feedback-content').hasClass('feedback-on'))
    //     {
    //         $('#feedback form#feedback-content').slideUp(500).switchClass("feedback-on", "feedback-off");
    //         $("#feedback .up-down-icon").switchClass( "glyphicon-chevron-down", "glyphicon-chevron-up");
    //         ///Nếu chưa từng click vào nút "đăng ký" trong form -> set ajax///
    //         if($('#feedback').hasClass('on')) {
    //             var totalTime = 9000000000;
    //             window.setInterval(function () {
    //                 var timeCounter = totalTime;
    //                 var updateTime = eval(timeCounter) - eval(1);
    //                 totalTime = updateTime;
    //                 if (updateTime == 0) {
    //                     $("form#feedback-content").slideDown(500).switchClass("feedback-off", "feedback-on");
    //                     $("#feedback .up-down-icon").switchClass("glyphicon-chevron-up", "glyphicon-chevron-down");
    //                 }
    //             }, 1000);
    //
    //             ///Dùng ajax để set time kết thúc ẩn hiện form///
    //             $.ajax({
    //                 type: 'post',
    //                 url: sz_CurrentHost + '/api/common',
    //                 data: {
    //                     func: 'setTimeFeedback',
    //                     totalTime: totalTime
    //                 },
    //                 dataType: 'json',
    //                 success: function (data) {
    //
    //                 }
    //             });
    //         }
    //     }
    //     else
    //     {
    //         $('#feedback form#feedback-content').slideDown(500).switchClass("feedback-off", "feedback-on");
    //         $("#feedback .up-down-icon").switchClass( "glyphicon-chevron-up", "glyphicon-chevron-down");
    //     }
    // });

    $("#feedback #feedback-header").click(function() {
        $('#feedback-2').slideDown(300);
        $('#bg-body-registerPopup').addClass('modal-backdrop');
    });

    //Khi hiện form đăng ký 2, nếu khách hàng click ẩn đi, thì sẽ set time mặc định là 180s sẽ hiện tiếp///
    $("#feedback-2 #close").click(function() {

        if (sz_CurrentPacth !== 'dien-dan' || sz_CurrentPacth !== 'trang-thong-tin') {

            $(this).closest('#feedback-2').slideUp('300');
            $('#bg-body-registerPopup').removeClass('modal-backdrop');
            var totalTime = 180;
            window.setInterval(function() {
                var timeCounter = totalTime;
                var updateTime = eval(timeCounter) - eval(1);
                totalTime = updateTime;
                if (updateTime == 0) {
                    $('#feedback-2').slideDown(300);
                    $('#bg-body-registerPopup').addClass('modal-backdrop');
                }
            }, 1000);

            ///Dùng ajax để set time kết thúc ẩn hiện form, dùng khi khách chuyển sang page khác///
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'setTimeFeedback2',
                    totalTime: totalTime
                },
                dataType: 'json',
                success: function(data) {

                }
            });
        }
    });

    // $("#feedback-2 #close").click(function () {
    //     $(this).closest('#feedback-2').slideUp('300');
    //     $('#bg-body-registerPopup').removeClass('modal-backdrop');
    // });


    // $('#feedback .glyphicon-remove').click(function() {
    //     $("#feedback-form").hide(300);
    //     $('#feedback #feedback-tab').removeClass('.hide-320px');
    // });

    ////Click nút đăng ký box đăng ký nhận tin dự án ở rìa phải website///
    $('.send-feedback').click(function() {
        $('#feedback .has-error').removeClass('has-error has-feedback');
        $('#feedback #feedback-form .glyphicon-remove').remove();
        var name = $('#feedback #name').val();
        var email = $('#feedback #email').val();
        var phone = $('#feedback #phone').val();
        if (GLOBAL_JS.b_fValidateEmpty(name)) {
            $('#feedback #name').closest('.form-group').addClass('has-error has-feedback');
            $('#feedback #name').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#feedback #name').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('#feedback #phone').closest('.form-group').addClass('has-error has-feedback');
            $('#feedback #phone').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#feedback #phone').focus();
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('#feedback #email').closest('.form-group').addClass('has-error has-feedback');
            $('#feedback #email').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#feedback #email').focus();
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('#feedback #email').closest('.form-group').addClass('has-error has-feedback');
            $('#feedback #email').closest('.form-group').append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
            $('#feedback #email').focus();
            return false;
        }
        var arrData = {
            'name': name,
            'email': email,
            'phone': phone,
            'url': window.location.href
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'sendRegisterProject',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                if (data.success == 1) {
                    $("#feedback-success").modal();
                    $('#feedback-2').remove();
                    // ga('send', 'event', {eventCategory: 'Nhan thong tin', eventAction: 'submit', eventLabel: 'signup', eventValue: 10}); ///Dùng cho adwords
                    $('#feedback form')[0].reset();
                    $('#feedback form#feedback-content').slideUp(300).removeClass('feedback-on').addClass('feedback-off');
                    $("#feedback .up-down-icon").removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                    $('.has-error').removeClass('has-error has-feedback');

                    $.ajax({
                        type: 'post',
                        url: sz_CurrentHost + '/api/common',
                        data: {
                            func: 'sendEmailRegisterProject',
                            arrData: arrData
                        },
                        dataType: 'json',
                        success: function(data) {}
                    });
                }
            }
        });
    });

    $('.send-feedback-2').click(function() {
        $('#feedback-2 .border-error').removeClass('border-error');
        var email = $('#feedback-2 #email').val();
        var phone = $('#feedback-2 #phone').val();
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('#feedback-2 #email').focus().addClass('border-error');
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('#feedback-2 #email').focus().addClass('border-error');
            return false;
        }
        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('#feedback-2 #phone').focus().addClass('border-error');
            return false;
        }
        var arrData = {
            'email': email,
            'phone': phone,
            'url': window.location.href
        };
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'sendRegisterProject',
                arrData: arrData
            },
            dataType: 'json',
            success: function(data) {
                if (data.success == 1) {
                    window.location = sz_CurrentHost + '/thank-you.html';
                    $('#feedback-2 form')[0].reset();
                    $('#feedback-2 .border-error').removeClass('border-error');
                    $('#feedback-2').remove();
                    $("#feedback-success").modal();
                    // ga('send', 'event', {eventCategory: 'Nhan thong tin', eventAction: 'submit', eventLabel: 'signup', eventValue: 10}); ///Dùng cho adwords

                    $.ajax({
                        type: 'post',
                        url: sz_CurrentHost + '/api/common',
                        data: {
                            func: 'sendEmailRegisterProject',
                            arrData: arrData
                        },
                        dataType: 'json',
                        success: function(data) {

                        }
                    });
                }
            }
        });
    });

    ///Tự động load popup khảo sát///
    // $('#projectSurveyPopup').modal('show');

    ///Slides jssor///
    if ($('.jsslider').length) {
        $(".jsslider").each(function(index) {
            var SliderID = $(this).attr('id');

            // ---- Just for my own reference while troubleshooting ----
            // console.log("Index: " + index + " | Created Slider with ID: " + SliderID );

            var jssor_1_SlideshowTransitions = [{
                $Duration: 1200,
                x: 0.3,
                $During: {
                    $Left: [0.3, 0.7]
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: -0.3,
                $SlideOut: true,
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: -0.3,
                $During: {
                    $Left: [0.3, 0.7]
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: 0.3,
                $SlideOut: true,
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: 0.3,
                $During: {
                    $Top: [0.3, 0.7]
                },
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: -0.3,
                $SlideOut: true,
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: -0.3,
                $During: {
                    $Top: [0.3, 0.7]
                },
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: 0.3,
                $SlideOut: true,
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: 0.3,
                $Cols: 2,
                $During: {
                    $Left: [0.3, 0.7]
                },
                $ChessMode: {
                    $Column: 3
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: 0.3,
                $Cols: 2,
                $SlideOut: true,
                $ChessMode: {
                    $Column: 3
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: 0.3,
                $Rows: 2,
                $During: {
                    $Top: [0.3, 0.7]
                },
                $ChessMode: {
                    $Row: 12
                },
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: 0.3,
                $Rows: 2,
                $SlideOut: true,
                $ChessMode: {
                    $Row: 12
                },
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: 0.3,
                $Cols: 2,
                $During: {
                    $Top: [0.3, 0.7]
                },
                $ChessMode: {
                    $Column: 12
                },
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                y: -0.3,
                $Cols: 2,
                $SlideOut: true,
                $ChessMode: {
                    $Column: 12
                },
                $Easing: {
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: 0.3,
                $Rows: 2,
                $During: {
                    $Left: [0.3, 0.7]
                },
                $ChessMode: {
                    $Row: 3
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: -0.3,
                $Rows: 2,
                $SlideOut: true,
                $ChessMode: {
                    $Row: 3
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: 0.3,
                y: 0.3,
                $Cols: 2,
                $Rows: 2,
                $During: {
                    $Left: [0.3, 0.7],
                    $Top: [0.3, 0.7]
                },
                $ChessMode: {
                    $Column: 3,
                    $Row: 12
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                x: 0.3,
                y: 0.3,
                $Cols: 2,
                $Rows: 2,
                $During: {
                    $Left: [0.3, 0.7],
                    $Top: [0.3, 0.7]
                },
                $SlideOut: true,
                $ChessMode: {
                    $Column: 3,
                    $Row: 12
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 3,
                $Assembly: 260,
                $Easing: {
                    $Clip: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 3,
                $SlideOut: true,
                $Assembly: 260,
                $Easing: {
                    $Clip: $Jease$.$OutCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 12,
                $Assembly: 260,
                $Easing: {
                    $Clip: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }, {
                $Duration: 1200,
                $Delay: 20,
                $Clip: 12,
                $SlideOut: true,
                $Assembly: 260,
                $Easing: {
                    $Clip: $Jease$.$OutCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            }];

            var jssor_1_options = {
                $FillMode: 5,
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $Cols: 10,
                    $SpacingX: 8,
                    $SpacingY: 8,
                    $Align: 360
                }
            };

            //-----------------HERE IS WHERE THE MAGIC HAPPENS--------------
            var jssor_1_slider = new $JssorSlider$(SliderID, jssor_1_options);

            $('.jssor-pause', $(this)).click(function() {
                jssor_1_slider.$Pause();
            });

            $('.jssor-play', $(this)).click(function() {
                jssor_1_slider.$Play();
            });

            //--------------------------------------------------------------

            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
        });
    }

    $(document).on("click", ".show-menu-internal", function() {
        $('#col-left').addClass('hide');
        $('#detail-new-internal').removeClass('col-lg-9 col-md-9').addClass('col-lg-12 col-md-12');
        $('#list-apartment-internal').removeClass('col-lg-9 col-md-9').addClass('col-lg-12 col-md-12');
        $(this).removeClass('show-menu-internal').addClass('hide-menu-internal');
        $(this).find('span').text('Hiện Menu trái');
    });

    $(document).on("click", ".hide-menu-internal", function() {
        $('#col-left').removeClass('hide');
        $('#detail-new-internal').removeClass('col-lg-12 col-md-12').addClass('col-lg-9 col-md-9');
        $('#list-apartment-internal').removeClass('col-lg-12 col-md-12').addClass('col-lg-9 col-md-9');
        $(this).removeClass('hide-menu-internal').addClass('show-menu-internal');
        $(this).find('span').text('Ẩn Menu trái');
    });

    /////Gọi popup khi yêu cầu Lock////
    $('.call-popup-dat-cho').click(function() {
        // alert('fom dat cho');
        var me = $(this);
        var apartment = me.attr('data-apartment');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadInfoPopupApartment',
                apartment: apartment
            },
            dataType: 'json',
            success: function(data) {
                var apart = data.apartment;
                if (apart.activeBooking == false || apart.status != 2) {
                    $("#popupBooking").modal();
                } else {
                    var songuoilocktieptheo = data.songuoilocktieptheo;
                    if (songuoilocktieptheo <= apart.gioihanlock) {
                        $("#popup-dat-cho").modal();
                        var countdownTime = data.countdownTime;
                        $('#popup-dat-cho #coundownTime span').text(countdownTime);
                        autoOffPopupBooking(countdownTime);
                        me.removeAttr('class').attr('class', 'aBooking call-popup-booking');
                        $("#popup-dat-cho").attr({
                            'data-apartment': apartment,
                            'type-open': '1'
                        });
                        var textHeartWall = apart.price.heartWall != '' && apart.price.heartWall != 0 && apart.price.heartWall != null ? apart.price.heartWall + ' (VNĐ)' : 'Đang cập nhật';
                        var textWaterWall = apart.price.waterWall != '' && apart.price.waterWall != 0 && apart.price.heartWall != null ? apart.price.waterWall + ' (VNĐ)' : 'Đang cập nhật';
                        var textTotal = apart.price.total != '' && apart.price.total != 0 && apart.price.heartWall != null ? apart.price.total + ' (VNĐ)' : 'Đang cập nhật';

                        $('#popup-dat-cho #codeApartmentBooking').text(apart.code);
                        $('#popup-dat-cho #priceHeartWallBooking').text(textHeartWall);
                        $('#popup-dat-cho #priceWaterWallBooking').text(textWaterWall);
                        $('#popup-dat-cho #priceApartmentBooking').text(textTotal);
                    } else {
                        $("#popupBooking").modal();
                    }
                    if (apart.status == 1) {
                        $('#popupBooking .redirect-info-booking').text('Còn trống').prop('disabled', true);
                    } else if (apart.status == 2) {
                        $('#popupBooking .redirect-info-booking').text('Đã giữ chỗ').prop('disabled', true);
                    } else if (apart.status == 3) {
                        $('#popupBooking .redirect-info-booking').text('Đã đặt chỗ').prop('disabled', true);
                    } else if (apart.status == 4) {
                        $('#popupBooking .redirect-info-booking').text('Đã đặt mua').prop('disabled', true);
                    } else if (apart.status == 5) {
                        $('#popupBooking .redirect-info-booking').text('Đã mua').prop('disabled', true);
                    } else if (apart.status == 6) {
                        $('#popupBooking .redirect-info-booking').text('Chủ đầu tư thu hồi').prop('disabled', true);
                    }
                }
            }
        });
    });

    /////Gọi popup thêm mới khách hàng đặt chỗ căn hộ////
    $('.addCustomerInfo').click(function() {
        var me = $(this);
        var idBooking = me.attr('data-id');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadFormCustomerInfo',
                idBooking: idBooking
            },
            dataType: 'json',
            success: function(data) {
                var apart = data.apartment;
                var bookingList = data.bookingList;
                var listCustomer = data.listCustomer;
                var textHeartWall = apart.price.heartWall != '' && apart.price.heartWall != 0 && apart.price.heartWall != null ? apart.price.heartWall + ' (VNĐ)' : 'Đang cập nhật';
                var textWaterWall = apart.price.waterWall != '' && apart.price.waterWall != 0 && apart.price.heartWall != null ? apart.price.waterWall + ' (VNĐ)' : 'Đang cập nhật';
                var textTotal = apart.price.total != '' && apart.price.total != 0 && apart.price.heartWall != null ? apart.price.total + ' (VNĐ)' : 'Đang cập nhật';

                $('#popup-dat-cho #codeApartmentBooking').text(apart.code);
                $('#popup-dat-cho #priceHeartWallBooking').text(textHeartWall);
                $('#popup-dat-cho #priceWaterWallBooking').text(textWaterWall);
                $('#popup-dat-cho #priceApartmentBooking').text(textTotal);
                $('#popup-dat-cho #projectBooking').text(apart.project.projectName);
                $('#popup-dat-cho #buildingBooking').text(apart.building.buildingName);
                $('#popup-dat-cho #xac-nhan-dat-cho').attr('data-id', bookingList._id.$id);

                $('#popup-dat-cho #name').val(bookingList.customer.customerName);
                $('#popup-dat-cho #phone').val(bookingList.customer.customerPhone);
                $('#popup-dat-cho #email').val(bookingList.customer.customerEmail);
                $('#popup-dat-cho #cmnd').val(bookingList.customer.customerCmnd);
                $('#popup-dat-cho #address').val(bookingList.customer.customerAddress);
                $('#popup-dat-cho #money').val(bookingList.money);
                $('#popup-dat-cho #block-multi-img').html('');

                var htmlCus = '<option value="">Chọn khách hàng</option>';
                $(listCustomer).each(function(index, cus) {
                    htmlCus += '<option value="' + cus.id + '">' + cus.name + ' - ' + cus.email + '</option>';
                });
                $("#popup-dat-cho #listCustomer").html(htmlCus);

                if (bookingList.img.length > 0) {
                    $(bookingList.img).each(function(index, img) {
                        $('#popup-dat-cho #block-multi-img').append('<div>\n' +
                            '                                <input type="file" name="img" id="imageUpload" class="selectImg hide"/>\n' +
                            '                                <label class="btn btn-primary btn-sm clickSelectImg">Select</label>\n' +
                            '                                <label class="btn btn-danger btn-sm deleteImg">Delete</label><br>\n' +
                            '                                <img src="' + img + '" id="imagePreview" alt="Preview Image" style="width: 50%"/>\n' +
                            '                                <input class="valueImg hide" type="text" value="' + img + '">\n' +
                            '                            </div>');
                    });
                } else {
                    $('#popup-dat-cho #block-multi-img').append('<div>\n' +
                        '                                <input type="file" name="img" id="imageUpload" class="selectImg hide"/>\n' +
                        '                                <label class="btn btn-primary btn-sm clickSelectImg">Select</label><br>\n' +
                        '                                <img id="imagePreview" alt="Preview Image" style="width: 50%" class="hide"/>\n' +
                        '                            </div>');
                }

                $("#popup-dat-cho").modal();
            }
        });
    });

    /////Gọi popup gửi yêu cầu giao dịch////
    $('.callRequestTransaction').click(function() {
        var me = $(this);
        var idBooking = me.attr('data-id');
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadRequestTransaction',
                idBooking: idBooking
            },
            dataType: 'json',
            success: function(data) {
                var apart = data.apartment;
                var bookingList = data.bookingList;
                var listCustomer = data.listCustomer;
                var textHeartWall = apart.price.heartWall != '' && apart.price.heartWall != 0 && apart.price.heartWall != null ? apart.price.heartWall + ' (VNĐ)' : 'Đang cập nhật';
                var textWaterWall = apart.price.waterWall != '' && apart.price.waterWall != 0 && apart.price.heartWall != null ? apart.price.waterWall + ' (VNĐ)' : 'Đang cập nhật';
                var textTotal = apart.price.total != '' && apart.price.total != 0 && apart.price.heartWall != null ? apart.price.total + ' (VNĐ)' : 'Đang cập nhật';

                $('#popupRequestTransaction #codeApartmentBooking').text(apart.code);
                $('#popupRequestTransaction #priceHeartWallBooking').text(textHeartWall);
                $('#popupRequestTransaction #priceWaterWallBooking').text(textWaterWall);
                $('#popupRequestTransaction #priceApartmentBooking').text(textTotal);
                $('#popupRequestTransaction #projectBooking').text(apart.project.projectName);
                $('#popupRequestTransaction #buildingBooking').text(apart.building.buildingName);
                $('#popupRequestTransaction #sendRequestTransaction').attr('data-id', bookingList._id.$id);

                $('#popupRequestTransaction #name').val(bookingList.customer.customerName);
                $('#popupRequestTransaction #phone').val(bookingList.customer.customerPhone);
                $('#popupRequestTransaction #email').val(bookingList.customer.customerEmail);
                $('#popupRequestTransaction #cmnd').val(bookingList.customer.customerCmnd);
                $('#popupRequestTransaction #address').val(bookingList.customer.customerAddress);

                var htmlCus = '<option value="">Chọn khách hàng</option>';
                $(listCustomer).each(function(index, cus) {
                    htmlCus += '<option value="' + cus.id + '">' + cus.name + ' - ' + cus.email + '</option>';
                });
                $("#popupRequestTransaction #listCustomer").html(htmlCus);
                $("#popupRequestTransaction").modal();
            }
        });
    });

    $("#popupRequestTransaction #listCustomer").change(function() {
        var id = $(this).val();
        $('#boxCustomerInfo input').val('');
        if (id != '') {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'loadCustomerInfo',
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    var cus = data.customer;
                    $('#boxCustomerInfo #name').val(cus.name);
                    $('#boxCustomerInfo #phone').val(cus.phone);
                    $('#boxCustomerInfo #email').val(cus.email);
                    $('#boxCustomerInfo #cmnd').val(cus.cmnd);
                    $('#boxCustomerInfo #address').val(cus.address);
                }
            });
        }
    });


    /////Load khách hàng để add vào booking////
    $('.loadListCustomer').click(function() {
        $.ajax({
            type: 'post',
            url: sz_CurrentHost + '/api/common',
            data: {
                func: 'loadListCustomer'
            },
            dataType: 'json',
            success: function(data) {
                var htmlOp = '<option value="">Chọn khách hàng</option>';
                $(data).each(function(index, cus) {
                    htmlOp += '<option value="' + index + '">' + cus.name + ' - ' + cus.email + '</option>';
                });
                $("#popuploadListCustomer #customer").html(htmlOp);
                $("#popuploadListCustomer").modal();
            }

        });
    });

    //Xác nhận đặt chỗ căn hộ///
    $('#xac-nhan-dat-cho').click(function(event) {
        event.preventDefault();
        var name = $('#popup-dat-cho #name').val();
        if (GLOBAL_JS.b_fValidateEmpty(name)) {
            $('#popup-dat-cho #error').removeClass('hide').text('Bạn cần nhập đầy đủ họ tên khách hàng!');
            $('#popup-dat-cho #name').focus();
            return false;
        }

        var phone = $('#popup-dat-cho #phone').val();
        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('#popup-dat-cho #error').removeClass('hide').text('Bạn cần nhập số điện thoại khách hàng!');
            $('#popup-dat-cho #phone').focus();
            return false;
        }

        var email = $('#popup-dat-cho #email').val();
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('#popup-dat-cho #error').removeClass('hide').text('Bạn cần nhập email!');
            $('#popup-dat-cho #phone').focus();
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('#popup-dat-cho #error').removeClass('hide').text('Email chưa đúng định dạng!');
            $('#popup-dat-cho #email').focus();
            return false;
        }

        var cmnd = $('#popup-dat-cho #cmnd').val();
        var address = $('#popup-dat-cho #address').val();
        var arrImg1 = [];
        var arrImg2 = [];
        var formdata = new FormData();
        if ($('.valueImg').length > 0) {
            $('.valueImg').each(function() {
                arrImg1.push($(this).val());
            });
        }
        $('.selectImg').each(function(index) {
            var file = $(this).prop('files')[0];
            if (file) {
                var type = file.type;
                var size = file.size;
                var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
                var stt = index + 1;
                if (!(type == match[0] || type == match[1] || type == match[2] || type == match[3])) {
                    $('#popup-dat-cho #error').removeClass('hide').text('Chỉ được upload File ảnh');
                    // $('#imageUpload').val('');
                    return false;
                }
                if (size > 2048000) {
                    $('#popup-dat-cho #error').removeClass('hide').text('Chỉ được upload File dưới 2 MB');
                    return false;
                }
                formdata.append('photo[' + index + ']', file);
                arrImg2.push(file);
            }
        });

        if (arrImg1.length == 0 && arrImg2.length == 0) {
            $('#popup-dat-cho #error').removeClass('hide').text('Bạn cần upload ảnh!');
            return false;
        }
        if (confirm("Bạn chắc chắn xác nhận đăng ký thông tin khách hàng này?")) {
            formdata.append("func", 'xacnhandatcho');
            formdata.append("idBooking", $(this).attr('data-id'));
            formdata.append("name", name);
            formdata.append("phone", phone);
            formdata.append("email", email);
            formdata.append("cmnd", cmnd);
            formdata.append("address", address);
            formdata.append("type", $('#popup-dat-cho #type').val());
            formdata.append("money", $('#popup-dat-cho #money').val());
            formdata.append("arrImg1", arrImg1);

            $.ajax({
                url: sz_CurrentHost + '/api/common',
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data) {
                    if (data.success == 1) {
                        alert(data.alert);
                        window.location = window.location.href;
                    } else {
                        $('#popup-dat-cho #error').removeClass('hide').text(data.alert);
                    }
                }
            });
        }
    });

    //Xác nhận đặt chỗ căn hộ///
    $('#sendRequestTransaction').click(function(event) {
        event.preventDefault();
        var name = $('#popupRequestTransaction #name').val();
        if (GLOBAL_JS.b_fValidateEmpty(name)) {
            $('#popupRequestTransaction #error').removeClass('hide').text('Bạn cần nhập đầy đủ họ tên khách hàng!');
            $('#popupRequestTransaction #name').focus();
            return false;
        }

        var phone = $('#popupRequestTransaction #phone').val();
        if (GLOBAL_JS.b_fValidateEmpty(phone)) {
            $('#popupRequestTransaction #error').removeClass('hide').text('Bạn cần nhập số điện thoại khách hàng!');
            $('#popupRequestTransaction #phone').focus();
            return false;
        }

        var email = $('#popupRequestTransaction #email').val();
        if (GLOBAL_JS.b_fValidateEmpty(email)) {
            $('#popupRequestTransaction #error').removeClass('hide').text('Bạn cần nhập email!');
            $('#popupRequestTransaction #phone').focus();
            return false;
        }
        if (!GLOBAL_JS.b_fCheckEmail(email)) {
            $('#popupRequestTransaction #error').removeClass('hide').text('Email chưa đúng định dạng!');
            $('#popupRequestTransaction #email').focus();
            return false;
        }

        var cmnd = $('#popupRequestTransaction #cmnd').val();
        var address = $('#popupRequestTransaction #address').val();
        if (confirm("Bạn chắc chắn xác nhận gửi yêu cầu giao dịch này tới TKKD?")) {
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'sendRequestTransaction',
                    idBooking: $(this).attr('data-id'),
                    name: name,
                    phone: phone,
                    email: email,
                    cmnd: cmnd,
                    address: address,
                    name: name,
                    name: name,
                },
                dataType: 'json',
                success: function(data) {
                    alert(data.alert);
                    if (data.success == 1) {
                        window.location = window.location.href;
                    }
                }
            });
        }
    });

    $('.managerConfirm').click(function() {
        var stt = $(this).attr('data-stt');
        var strConfirm = 'Bạn xác nhận Đồng ý duyệt Lock căn này?';
        if (stt == 3) strConfirm = 'Bạn xác nhận Từ chối duyệt Lock căn này?';
        if (confirm(strConfirm)) {
            var idBooking = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'managerConfirm',
                    idBooking: idBooking,
                    stt: stt
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
    $('.cancelLock').click(function() {
        var strConfirm = 'Bạn xác nhận Hủy Lock căn này?';
        if (confirm(strConfirm)) {
            var idBooking = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                url: sz_CurrentHost + '/api/common',
                data: {
                    func: 'cancelLock',
                    idBooking: idBooking
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
    $('#addImg').click(function() {
        $('#popup-dat-cho #block-multi-img').append('<div>\n' +
            '                                <input type="file" name="img" id="imageUpload" class="selectImg hide"/>\n' +
            '                                <label class="btn btn-primary btn-sm clickSelectImg">Select</label>&nbsp;\n' +
            '                                <label class="btn btn-danger btn-sm deleteImg">Delete</label> <br>\n' +
            '                                <img id="imagePreview" alt="Preview Image" style="width: 50%" class="hide"/>\n' +
            '                            </div>');
    });
    $(document).on("click", ".deleteImg", function() {
        if ($('.clickSelectImg').length == 1) {
            $(this).closest('div').find('#imagePreview').removeAttr('src').addClass('hide');
            $(this).closest('div').find('.valueImg').remove();
            $(this).remove();
        } else {
            $(this).closest('div').remove();
        }
    });

    $(document).on("click", ".clickSelectImg", function() {
        $(this).closest('div').find('.selectImg').click();
    });
    $(document).on("change", ".selectImg", function() {
        var divParent = $(this).closest('div');
        readImgUrlAndPreview(this, divParent);

        function readImgUrlAndPreview(input, divParent) {
            console.log(input.files[0]);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    divParent.find('#imagePreview').removeClass('hide').attr('src', e.target.result);
                    divParent.find('.valueImg').remove();
                    divParent.append('<input class="valueImg hide" type="text" value="">');
                    divParent.find('.valueImg').val('');
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
});