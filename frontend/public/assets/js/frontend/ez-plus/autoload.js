$(document).ready(function() {
    if (typeof ezPlus == 'undefined') {
        ezPlus = true;

        var domain = 'http://vietkaoland.com';

        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = domain + '/public/plugin/ez-plus/jquery.ez-plus.js';
        script.onload = function() {
            var ezOption = {
                scrollZoom: true,
                zoomType: 'lens',
                lensShape: 'round',
                lensSize: 200,
                containLensZoom: true,
                zoomActivation: 'click',
                onImageOver: function($elem) {
                    var $slider = $elem.closest('.jsslider');
                    if ($slider.length > 0) {
                        $('.jssor-pause', $slider).trigger('click');
                    }
                },
                onImageOut: function($elem) {
                    var $slider = $elem.closest('.jsslider');
                    if ($slider.length > 0) {
                        $('.jssor-play', $slider).trigger('click');
                    }
                }
            }

            var ezIndex = 1;

            $('.ez-plus-zoom').each(function() {
                var $this = $(this);

                if (!$this.attr('id')) {
                    ezIndex++;
                    $this.attr('id', 'ez-img-' + ezIndex);
                }

                $this.css({
                    'border': '1px solid #eee'
                });

                $this.wrap('<div class="ez-wrap" style="position: relative;"></div>');

                $this.after('<div class="ez-share" style="position: absolute; top:0px; right: 0px; z-index: 999999; display: inline-block; padding: 5px 10px; font-size: 12px; line-height: 1; cursor: pointer; background-color: #015DA5; color: #fff; transition: all 0.3s; border-radius: 2px;">share</div>');

                $this.ezPlus(ezOption);
            });

            $('body').on('click', '.ez-share', function(e) {
                var $this = $(this);
                var $image = $this.parent().find('.ez-plus-zoom');

                if ($image.length) {
                    var width = $image.width();
                    var height = $image.height();
                    var thumb = $image.attr('src');
                    var origin = $image.data('zoom-image');
                    var src = domain + '/zoom.html?thumb=' + thumb + '&origin=' + origin;

                    var html = '<iframe src="' + src + '" style="width: ' + width + 'px; height: ' + height + 'px; max-width: 100%;" frameBorder="0" scrolling="no"></iframe>';

                    copyToClipboard(html);

                    $this.text('copied').css({
                        'background-color': '#f48020'
                    });

                    setTimeout(function() {
                        $this.text('share').css({
                            'background-color': '#015DA5'
                        });
                    }, 500);
                }

            });

            $('body').on('dblclick', '.zoomLens', function(e) {
                var $parent = $(e.target).parent();

                if ($parent.hasClass('ZoomContainer')) {
                    var image_id = $parent.attr('id').replace('-ZoomContainer', '');
                    var $image = $('#' + image_id);

                    if ($image.length) {
                        var width = $image.width();
                        var height = $image.height();
                        var thumb = $image.attr('src');
                        var origin = $image.data('zoom-image');
                        var src = domain + '/zoom.html?thumb=' + thumb + '&origin=' + origin;

                        var html = '<iframe src="' + src + '" style="width: ' + width + 'px; height: ' + height + 'px; max-width: 100%;" frameBorder="0" scrolling="no"></iframe>';

                        copyToClipboard(html);
                    }
                }

            });
        };

        console.log('ezPlus loaded.');
    }

    document.getElementsByTagName('body')[0].appendChild(script);
});

function copyToClipboard(str) {
    const el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style.position = 'absolute';
    el.style.left = '-9999px';
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
};