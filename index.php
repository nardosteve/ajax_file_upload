<?php
    include_once 'db/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>AJAX File Upload</title>
</head>
<body>

    <h1 class="text-center mt-5">AJAX File Upload</h1>

    <div class="container w-50 mt-4">
        <div class="statusMsg"></div>
        <form id="formSubmit" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                </div>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="file" name="file" aria-describedby="file">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" id="submit" class="btn btn-outline-success">Save</button>
            </div>
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
    // $(document).ready(function(e){
    //     $('#formSubmit').on('submit', function(e){
    //         e.preventDefault();
    //         //
    //         var formData = new FormData(this);

    //         $.ajax({
    //             type: 'POST',
    //             url: 'db/insert.php',
    //             data: formData,
    //             dataType: 'json',
    //             contentType: false,
    //             processData: false,
    //             beforeSend: function(){
    //                 $('.btn').attr("disabled", "disabled");
    //                 $('#formSubmit').css("opacity", ".5");
    //             },
    //             success: function(response){
    //                 $('.statusMsg').html('');
                    
    //                 if(response.status == 1){
    //                     $('#formSubmit')[0].reset();
    //                     $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>')
    //                 }else{
    //                     ('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
    //                 }
    //                 $('#formSubmit').css("opacity","");
    //                 $(".btn").removeAttr("disabled");
    //             }
    //         });
    //     });

    //     // File type validation
    //     $("#file").change(function() {
    //         var file = this.files[0];
    //         var fileType = file.type;
    //         var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    //         if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
    //             alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
    //             $("#file").val('');
    //             return false;
    //         }
    //     });
    // });

    $(document).ready(function(e){
    // Submit form data via Ajax
    $("#formSubmit").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'insert.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.btn').attr("disabled","disabled");
                $('#formSubmit').css("opacity",".5");
            },
            success: function(response){
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>