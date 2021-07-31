<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chat";

    $connection = new mysqli($servername, $username, $password, $dbname);

    if(!$connection){
        echo "Database connected".mysqli_connect_error();
    }
?>