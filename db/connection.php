<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_file";

//creating a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
    echo '
        <div class="container mt-5">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                Connected Successfuly
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    ';
}

?>