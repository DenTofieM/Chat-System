<?php

session_start();
include_once "config.php";
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if(!empty($email) && !empty($password)){
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_array($sql);
        $status = "Active now";
        $sql2 = mysqli_query($connection, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
        if($sql2){
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }
    }else{
        echo "Email or Password is incorrect!";
    }

}else{
    echo "All input fields are required!";
}


?>