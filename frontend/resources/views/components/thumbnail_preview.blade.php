<style>
    img {
        width: 100%;
    }
    #thumbnail_preview {
        width: 100%;
        height: 0px;
        background: no-repeat;
    }
    .show-placeholder div:first-child {
        display: none
    }
</style>
<script>
    $('input[name="thumbnail_url"]').on('change', function () {
        console.log(this.files);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function () { // set image data as background of div
                $('#thumbnail_preview').css({'background-image': 'url("' + this.result + '")', 'height': '300px'});
            }
        }
    });
    $('input[name="top_background_url"]').on('change', function () {
        console.log(this.files);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function () { // set image data as background of div
                $('#top_background_preview').css({'background-image': 'url("' + this.result + '")', 'height': '300px'});
            }
        }
    });
    $('input[name="banner_image"]').on('change', function () {
        console.log(this.files);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function () { // set image data as background of div
                $('#banner_preview').css({'background-image': 'url("' + this.result + '")', 'height': '300px'});
            }
        }
    });
</script>
