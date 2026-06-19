<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
        <link href="cropperjs/cropper.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <form method="post">
                <input type="file" id="crop_img" name="image" class="image" hidden>
                <input type="text" name="id" class="id" value="<?php if(isset($_SESSION['admin_id'])){echo $_SESSION['admin_id']; }else if(isset($_SESSION['id'])){ echo $_SESSION['id']; }?>" hidden>
            </form>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Crop image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <!--  default image where we will set the src via jquery-->
                                    <img id="image">
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="crop">Crop</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="cropperjs/cropper.min.js" type="text/javascript"></script>
<script>

    var bs_modal = $('#modal');
    var image = document.getElementById('image');
    var cropper,reader,file;


    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            bs_modal.modal('show');
        };


        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            minWidth : 256,
            minHeight : 256,
            maxWidth : 1500,
            maxHeight : 1500,
            fillColor : '#fff',
            imageSmoothingEnabled : true,
            imageSmoothingQuality : 'high',

        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            var id = $('.id').val();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "upload.php",
                    data: {image: base64data,id:id},
                    success: function(data) {
                        if (data == 1) {
                            bs_modal.modal('hide');
                            window.location = 'my_profile.php';
                        }else{
                            alert('We Can not Get Your File...');
                        }
                    }
                });
            };
        });
    });

</script>
</body>
</html>
