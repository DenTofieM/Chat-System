<?php 

    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
        $messege = mysqli_real_escape_string($connection, $_POST['messege']);

        if(!empty($messege)){
            $sql = mysqli_query($connection, "INSERT INTO messeges (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming_id}, {$outgoing_id}, '{$messege}')") or die();
        }
    }else{
        header("location: ../login.php");
    }

?>