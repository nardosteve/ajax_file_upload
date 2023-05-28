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
        <form id="formSubmit" action="insert.php" method="POST" enctype="multipart/form-data">
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
                <input type="file" class="form-control" multiple id="file" name="file" aria-describedby="file">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" value="Save" id="submitBtn" class="btn btn-outline-success">Save</button>
            </div>

            <!-- display msg -->
            <div class="statusMsg"></div>
            <!-- display msg -->
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#submitBtn').click(function(e){
            //
            e.preventDefault();

            var formData = new FormData();

            //Get input by id
            var fileSelect = document.getElementById('file');
            //Get selected file from input
            var files = fileSelect.files;

            formData.append('name', $('#name').val());
            formData.append('email', $('#email').val());

            //Get file using a loop
            for(var i = 0; i < files.length; i++){
                var file = files[i];
                console.log(file);
                formData.append('files', file, file.name);
            }

            //disable dubmit btn
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: 'insert.php',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                success: function(data){
                    $('#statusMsg').text(data);
                    console.log("Sucesss: ", data);
                    $('#submitBtn').prop('disabled', false);
                } ,
                error: function(e){
                    $("#statusMsg").text(e.responseText);
                    console.log("Error: ", e);
                    $("#submitBtn").prop("disabled", false);
                }  
            });
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>