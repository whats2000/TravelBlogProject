$(document).ready(function () {
    $image_crop = $('#icon-upload').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload-image').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#modal-upload-icon').modal('show');
    });

    $('.crop_image').click(function (event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            $.ajax({
                url: "./profile_edit/icon_edit/icon_form_handle.php",
                type: "POST",
                data: {
                    "image": response
                },
                success: function (data) {
                    $('#modal-upload-icon').modal('hide');
                    $('#uploaded-image').html(data);
                }
            });
        })
    });
});