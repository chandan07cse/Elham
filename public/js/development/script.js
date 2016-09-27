$('document').ready(function(){

    $('#flashing').delay(5000).fadeOut();
    $('.summernote').summernote({
        height: 200,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
    });

    $('#articleInputForm').on('submit', function (e) {

        e.preventDefault();
        //alert($('.summernote').summernote('code'));
        //alert($('.summernote').val());
        var caption = $('#caption').val();
        var description = $('#description').val();
        $.ajax({
            type: "POST",
            url: "/articles/post",
            data:{
                "caption":caption,
                "description":description
            },
            dataType:"json",
            success: function(response){
                alertify.alert(response.InputConfirmation);
                var errorBag = JSON.parse(response.errorBag);
                var captionErrorCount = 0;
                var captionError = "<ul class='validate_error'>";
                $.each(errorBag.caption, function(i,item){
                    captionError += "<li>"+item+"</li>";
                    captionErrorCount = 1;
                });
                captionError +="</ul>";

               if(captionErrorCount>0)
                alertify.alert('Caption Error Occurred',captionError,function(){
                    alertify.error("Please Fix The Caption Error");
                });

                var descriptionError = "<ul class='validate_error'>";
                var descriptionErrorCount = 0;
                $.each(errorBag.description, function(i,item){
                    descriptionError += "<li>"+item+"</li>";
                    descriptionErrorCount = 1;
                });
                descriptionError +="</ul>";
                if(descriptionErrorCount > 0)
                    alertify.alert('Description Error Occurred',descriptionError,function(){
                        alertify.error("Please Fix The Description Error");
                    });
                //if(response.InputConfirmation)


            }
        });
    });
    $('input[name=image]').change(function(){
        $("#oldImage").hide();
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#currentImage').attr('src',e.target.result);
            $('#currentImage').attr('width',100,'height',100);
         };
        reader.readAsDataURL(this.files[0]);
    });

    $('#delete').click(function(){
        var articleId = $(this).val();
        alertify.confirm('Are You Sure ?', 'Press Ok to delete or Cancel to exit', function(){
            window.location="/article/delete/"+articleId;
        },function(){ alertify.error('No Problem')});
    });

    $('.article').click(function(){
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: "/articles/"+id,
            data : {
                "id":id
            },
            dataType: "json",
            success: function(response){
                alertify.alert(response.caption, response.description);
            }
        });
    });

    return false;
});

