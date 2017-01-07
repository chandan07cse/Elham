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
              if(response.InputConfirmation)
                alertify.alert('Thank You',response.InputConfirmation);
                else{
                var errorBag = JSON.parse(response.errorBag);

                if(errorBag.caption){
                var captionError = "<ul class='validate_error'>";
                $.each(errorBag.caption, function(i,item){
                    captionError += "<li>"+item+"</li>";
                    });
                captionError +="</ul>";
                alertify.alert('Caption Error Occurred',captionError,function(){
                    alertify.error("Please Fix The Caption Error");
                });
              }

              if (errorBag.description) {
                var descriptionError = "<ul class='validate_error'>";
                $.each(errorBag.description, function(i,item){
                    descriptionError += "<li>"+item+"</li>";
                });
                descriptionError +="</ul>";

                alertify.alert('Description Error Occurred',descriptionError,function(){
                    alertify.error("Please Fix The Description Error");
                });
            }

            }
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
