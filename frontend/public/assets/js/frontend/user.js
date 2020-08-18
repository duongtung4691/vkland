// request permission on page load.
document.addEventListener('DOMContentLoaded', function() {
    if (Notification.permission !== "granted")
        Notification.requestPermission();
});
js_user = {};
/*** REGION INIT */
js_user.GLOBAL_JS = {
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
var t = $(location).attr("href");
js_user.sz_CurrentHost = t.split("/")[0] + "//" + t.split("/")[2];
js_user.sz_CurrentPacth = t.split("/")[3];
js_user.toastr = function(msg, type) {
    if (type === 'error') {
        toastr.error(msg, "Thông báo");
    } else if (type === 'success') {
        toastr.success(msg, "Thông báo");
    } else {
        toastr.error(msg, "Thông báo");
    }
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
};

//Desktop notification
js_user.notifyMe = function(data) {
    if (!Notification) {
        alert('Desktop notifications not available in your browser. Try Chromium.');
        return;
    }

    if (Notification.permission !== "granted")
        Notification.requestPermission();
    else {
        var notification = new Notification(data['title'], {
            icon: 'https://freetuts.net/public/logo/icon.png', // Hình ảnh
            body: 'Bạn có một tin nội bộ mới'
        });

        notification.onclick = function() {
            window.open(data['link']);
            notification.close();
        };
        setTimeout(function() {
            notification.close();
        }, 8000);

    }
}

js_user.init = function() {
    // Enable pusher logging - don't include this in production
    //     Pusher.logToConsole = true;
    //
    //     var pusher = new Pusher('d1f56fcd07b786ab7ed4', {
    //         cluster: 'ap1',
    //         encrypted: true
    //     });
    //     var channel = pusher.subscribe('dxmb-news');
    //     channel.bind('dxmb-news', function (data) {
    //         console.log(data);
    //         // alert(data.message);
    //         // toastr.success(html);
    //         iziToast.show({
    //             id: 'haduken',
    //             theme: 'dark',
    //             title: 'Tin mới',
    //             message: data.message['title'],
    //             position: 'bottomRight',
    //             transitionIn: 'flipInX',
    //             transitionOut: 'flipOutX',
    //             progressBarColor: 'rgb(0, 255, 184)',
    //             image: data.message['image'],
    //             imageWidth: 100,
    //             maxWidth: 400,
    //             layout: 2,
    //             balloon: true,
    //             timeout: 7000,
    //             onClose: function () {
    //                 // console.info('onClose');
    //             },
    //             onClosing: function (instance, toast, closedBy) {
    //                 // console.log(' mo 1 lan');
    //                 var arrData = {
    //                     'type': 2,
    //                     'link': data.message['link'],
    //                 }
    //                 js_user.logPush(arrData);
    //             },
    //
    //             buttons: [
    //                 ['<button>Đọc tin</button>', function (instance, toast) {
    //                     var arrData = {
    //                         'type': 1,
    //                         'link': data.message['link'],
    //                     }
    //                     js_user.logPush(arrData);
    //                     window.location.href = data.message['link'];
    //                 }],
    //
    //             ],
    //         });
    //
    //         // Desktop notifaction
    //         // js_user.notifyMe(data.message);
    //     });
    if (js_user.sz_CurrentPacth !== 'dang-nhap') {

        // Set popup hiển thị
        //         if (Cookies.get('popup') === undefined) {
        //             $('#popup-1').slickModals({
        //                 // Popup type
        //                 popupType: 'delayed',
        //                 delayTime: 5000,
        //                 scrollTopDistance: 400,
        //                 // Auto closing
        //                 autoClose: false,
        //                 autoCloseDelay: 10000,
        //                 // Popup cookies
        //                 setCookie: false,
        //                 cookieDays: 30,
        //                 cookieTriggerClass: 'setCookie-1',
        //                 cookieName: 'SlickCookie',
        //                 cookieScope: 'domain',
        //                 // Overlay styling
        //                 overlayBg: true,
        //                 overlayClosesModal: true,
        //                 overlayBgColor: 'rgba(0, 0, 0, 0.8)',
        //                 overlayTransitionSpeed: '0.4',
        //                 // Background effects
        //                 pageEffect: 'none',
        //                 blurBgRadius: '1px',
        //                 scaleBgValue: '0.9',
        //                 // Popup styling
        //                 popupWidth: '480px',
        //                 popupHeight: '280px',
        //                 popupLocation: 'center',
        //                 popupAnimationDuration: '0.4',
        //                 popupAnimationEffect: 'slideBottom',
        //                 popupBoxShadow: '0 0 20px rgba(0,0,0,0.4)',
        //                 popupBackground: 'rgba(255, 255, 255, 1)',
        //                 popupRadius: '4px',
        //                 popupMargin: '30px',
        //                 popupPadding: '30px',
        //                 // Mobile rules
        //                 showOnMobile: true,
        //                 responsive: true,
        //                 mobileBreakPoint: '480px',
        //                 mobileLocation: 'center',
        //                 mobileWidth: '90%',
        //                 mobileHeight: '90%',
        //                 mobileRadius: '0px',
        //                 mobileMargin: '0px',
        //                 mobilePadding: '0px',
        //                 // Animate content
        //                 contentAnimate: true,
        //                 contentAnimateEffect: 'slideBottom',
        //                 contentAnimateSpeed: '0.4',
        //                 contentAnimateDelay: '0.4',
        //                 // Youtube videos
        //                 videoSupport: true,
        //                 videoAutoPlay: true,
        //                 videoStopOnClose: true,
        //                 // Close and reopen button
        //                 addCloseButton: true,
        //                 buttonStyle: 'labeled',
        //                 enableESC: true,
        //                 reopenClass: 'openSlickModal-1',
        //                 // Additional events
        //                 onSlickLoad: function () {
        //                     // Your code goes here
        //
        //                 },
        //                 onSlickClose: function () {
        //                     // Your code goes here
        //                     // window.location = $('#urlPopup').val();
        //                     // window.location.assign($('#urlPopup').val());
        //                     js_user.popupSession();
        //                 }
        //             });
        //         }
        setTimeout(function() {
            $('.bxslider-user').bxSlider({
                mode: 'fade',
                captions: true,
                slideWidth: 600,
                responsive: true,
                pager: false,
                auto: true
            });
        }, 1000);

        if ($('#popupModal').length) {
            setTimeout(function() {
                $('#popupModal').modal('show');
            }, 3000);

        }
    }


    // Xử lý up load avatar
    if ($('.iframe-btn-avatar').length) {
        $('.iframe-btn-avatar').fancybox({
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
                var url = responsive_filemanager_callback('avatar');
                js_user.changeAvatar(url);
            }
        });
    }

    function responsive_filemanager_callback(field_id) {

        var url = jQuery('#' + field_id).val();
        var parser = document.createElement('a');
        parser.href = url;
        return parser.pathname;
        //your code
    }
};

// After content loaded
$(function() {
    js_user.init();

});


/**
 * TaiHX
 * 13/09/2017
 * Module Login
 */

js_user.userLogin = function(ele) {
    var username = $('#username').val();
    var pass = $('#password').val();
    if (js_user.GLOBAL_JS.b_fValidateEmpty(username)) {
        $(".box-error").css({
            "display": "flex"
        });
        $('.box-error').removeClass('hide').html('Bạn chưa nhập tên đăng nhập');
        $('#username').closest('.form-group').removeClass('has-success').addClass('has-error');
        $('#username').focus();
        return false;
    }
    if (js_user.GLOBAL_JS.b_fValidateEmpty(pass)) {
        $(".box-error").css({
            "display": "flex"
        });
        $('.box-error').removeClass('hide').html('Bạn chưa nhập mật khẩu');
        $('#password').closest('.form-group').removeClass('has-success').addClass('has-error');
        $('#password').focus();
        return false;
    }

    var arrData = {
        'username': username,
        'password': pass,
        'type': $(ele).data("type"),
    }

    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'userLogin',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {
            if (data.success == 1) {
                window.location = data.link;
            } else {
                $(".box-error").css({
                    "display": "flex"
                });
                $('.box-error').removeClass('hide').html(data.alert);
            }
        }
    });
    //Tip trick to fix bug login - return error `errorparse`/ remove this code after fix
    setTimeout(
        function() {
            location.reload();
        }, 2000);

    return false;
}

js_user.userForgot = function(ele) {
    var email = $('#email').val();

    if (js_user.GLOBAL_JS.b_fValidateEmpty(email)) {
        $(".box-error").css({
            "display": "flex"
        });
        $('.box-error').removeClass('hide').html('Vui lòng điền email muốn khôi phục mật khẩu');
        $('#username').closest('.form-group').removeClass('has-success').addClass('has-error');
        $('#username').focus();
        return false;
    }

    var arrData = {
        'email': email,
    }
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'userForgot',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {
            if (data.success == 1) {
                $(".box-error").css({
                    "display": "flex"
                });
                $('.box-error').removeClass('hide').html(data.alert);
                $('#email').remove();
                $('#userLogin').remove();
                setTimeout(function() {
                    window.location = '/';
                }, 3000);

            } else {
                $(".box-error").css({
                    "display": "flex"
                });
                $('.box-error').removeClass('hide').html(data.alert);

            }

        }
    });
    return false;
}

js_user.getUser = function() {
    $('.user_notification').addClass('hide');
    $('.user_list_price').addClass('hide');
    $('.box-profile').removeClass('hide');
    $('.user_internal').addClass('hide');
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'getUser',
        },
        dataType: 'json',
        success: function(data) {
            if (!data.error) {
                $('.box-profile .profile-username').html(data.list[0]['fullname']);
                $('.box-profile .profile-email').html(data.list[0]['email']);
                $('.box-profile .profile-department').html(data.list[0]['department']);
                $('.box-profile .profile-createTime').html(data.list[0]['createTime']);
                $('.box-profile .text-muted').html(data.list[0]['position']);
                $('.dx_widget_news_list .c_internal').html(data.list[0]['c_internal']);
            } else {
                $(".box-error").css({
                    "display": "flex"
                });
                $('.box-error').removeClass('hide').html(data.msg);

            }
        }
    });
}

js_user.changePass = function(e) {
    var oldPass = $('#old-password-first').val();
    var newPass = $('#password-first').val();
    var reNewPass = $('#re-password-first').val();
    if (GLOBAL_JS.b_fValidateEmpty(oldPass)) {
        $('.box-error').removeClass('hide').html('Bạn cần nhập mật khẩu hiện tại!');
        $('#old-password-first').focus();
        return false;
    }
    if (GLOBAL_JS.b_fValidateEmpty(newPass)) {
        $('.box-error').removeClass('hide').html('Bạn cần nhập mật khẩu mới!');
        $('#password-first').focus();
        return false;
    }
    if (!GLOBAL_JS.b_fCheckMinLength(newPass, 6)) {
        $('.box-error').removeClass('hide').html('Mật khẩu mới phải từ 6 ký tự trở lên!!');
        $('#err-register').removeClass('hide').html('<strong>Mật khẩu mới phải từ 6 ký tự trở lên!</strong>');
        $('#password-first').focus();
        return false;
    }
    if (!GLOBAL_JS.b_fCheckConfirmPwd(newPass, reNewPass)) {
        $('.box-error').removeClass('hide').html('2 ô mật khẩu phải trùng nhau!');
        $('#re-password-first').focus();
        return false;
    }

    var arrData = {
        'oldPass': oldPass,
        'newPass': newPass
    }
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'firstPassword',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {
            if (data.success == 1) {
                $('#old-password-first').val('');
                $('#password-first').val('');
                $('#re-password-first').val('');

                js_user.toastr(data.msg, 'success');
                if (e === true) {
                    window.location = '/trang-thong-tin';
                }
            } else $('.box-error').removeClass('hide').html(data.alert);

        }
    });
    return false;
}


// Write log for analytic
js_user.logPush = function(arrData) {
    console.log(arrData);
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'logPush',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {

            if (data.success == 1) {
                console.log('ok');
            }
        }
    });
};

js_user.denyPopup = function(ele) {
    Cookies.set('popup', 'value', {
        expires: 1
    });

}

js_user.clickPopup = function(ele) {
    var id = $(ele).data("id");
    var url = $(ele).data("url");
    var arrData = {
        'id_session': id,
    }
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'popupSession',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {

            if (data.success == 1) {

                window.location = url;

            } else {
                js_user.toastr(data.msg);
            }
        }
    });

}
js_user.hidePopup = function(ele) {
    var id = $(ele).data("id");
    var all = true;
    var arrData = {
        'id_session': id,
    }
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'popupSession',
            arrData: arrData,
            all: all,
        },
        dataType: 'json',
        success: function(data) {

            if (data.success == 1) {
                $('#popupModal').modal('hide');
            } else {
                js_user.toastr(data.msg);
            }
        }
    });

}

// Write log for analytic
js_user.changeAvatar = function(url) {
    var arrData = {
        'avatar': url,
    }
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'changeAvatar',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {

            if (data.success == 1) {
                js_user.toastr(data.msg, 'success');

                $('.imgUpload').attr('src', url);
                $('.avatar').find('img').attr('src', url);

            } else {
                js_user.toastr(data.msg);
            }
        }
    });
}; // Write log for analytic

js_user.userCheckin = function() {
    var email = $('#email_checkin').val();
    // if (js_user.GLOBAL_JS.b_fValidateEmpty(email)) {
    //
    //
    //     swal({
    //         type: 'error',
    //         title: 'Oops...',
    //         text: 'Vui lòng điền email để checkin!',
    //     })
    //
    //     $(".box-error").css({"display": "flex"});
    //     $('.box-error').removeClass('hide').html('');
    //     $('#email_checkin').closest('.form-group').removeClass('has-success').addClass('has-error');
    //     $('#email_checkin').focus();
    //     return false;
    // }


    var arrData = {
        'email': email,
    }
    jQuery.ajax({
        type: 'post',
        url: js_user.sz_CurrentHost + '/api/users',
        data: {
            func: 'userCheckin',
            arrData: arrData
        },
        dataType: 'json',
        success: function(data) {
            if (data.success == 1) {
                $(".box-error").css({
                    "display": "flex"
                });
                $('.box-error').removeClass('hide').html(data.alert);

                swal({
                    type: 'success',
                    title: 'WOWW...',
                    text: 'Chúc mừng bạn đã check in thành công !!',
                })

                $('#email_checkin').remove();
                setTimeout(function() {
                    window.location = '/';
                }, 3000);

            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: data.alert,
                })
                $(".box-error").css({
                    "display": "flex"
                });
                $('.box-error').removeClass('hide').html(data.alert);

            }

        }
    });
    return false;
}; // Write log for analytic