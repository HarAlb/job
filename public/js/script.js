$(document).ready(function (){
    AOS.init();
    var imageRegexp = new RegExp(/(.jpg|\.png|\.jpeg)$/ ,'m');
    window.image = '';

    setTimeout(() => {
        $('#imageUploadModal').modal({backdrop: 'static', keyboard: false});
        $('#imageUploadModal .close').on('click', function (e) {
            console.log(window.cropper);
            if(window.cropper && confirm('We cant save your changes') == true){
                e.preventDefault();
                $('#imageUploadModal').modal('hide');
            }
        })
    }, 1500);

    $('#imageFileInput').on('change' , function (){
        let file = this.files[0];
        if(imageRegexp.test(file.name)){
            var image = $('img' , $(this).parents('#image-upload').next());
            readURLs(file , image);
        }else{
            alert('Allowed only image');
        }
    });

    // $(window).unload(function(){
    //     return 'dsadas';
    // })

    function readURLs(file , img) {
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {

                img.attr('src', e.target.result);
                window.cropper = new Cropper(img[0], {
                    autoCropArea: 0.7,
                    viewMode: 1,
                    center: true,
                    dragMode: 'move',
                    // movable: true,
                    scalable: true,
                    guides: true,
                    zoomOnWheel: true,
                    // cropBoxMovable: true,
                    wheelZoomRatio: 0.1,
                  })
                  $('#image-upload').addClass('d-none').next().removeClass('d-none');
                    $('.modal-footer').removeClass('d-none');
                setEventListerners();
            };
            reader.readAsDataURL(file);
        }
    }
    function setEventListerners(){
        var regexpRotate = new RegExp(/rotate-([a-z]*)\-([0-9]{2,3})$/ , 'm');
        var regexpMove = new RegExp(/move-([a-z]*)$/ , 'm');
        $(document).on('click' , '.rotate' , function (){
            var classes = $(this).attr('class').match(regexpRotate);
            var degree = classes[2]; 
            if(classes[1] === 'left') degree *= -1; 
            if(window.cropper){
                window.cropper.rotate(degree);
            }
        });

        $(document).on('click' , '.move' , function (){
            var offsetY = 0;
            var offsetX = 0;
            var className = $(this).attr('class').match(regexpMove)[1];
            switch(className){
                case 'down':
                    offsetY = -1;
                    break;
                case 'up':
                    offsetY = 1;
                    break;
                case 'left':
                    offsetX = 1;
                    break;
                case 'right':
                    offsetX = -1;
            }
            window.cropper.move(offsetX , offsetY);
        });
        $(document).on('click' , '.save' , function(){
            var input = $('input[type="email"]' , $(this).parents('.modal-footer'));
            if(input.val()){
                $.ajax({
                    method: 'post',
                    url: location.origin,
                    data: { email: input.val(), image: cropper.getCroppedCanvas().toDataURL('image/jpeg') ,_token:$('meta[name="csrf-token"]').attr('content')},
                    success: function (res){
                        if(res.errors) alert(res.message)
                        if(res.success) location.reload();
                    },
                    error: function (e){
                        console.log(e);
                    }
                });
            }else{
                $(input).addClass('is-invalid');
            }
        })
    }
})