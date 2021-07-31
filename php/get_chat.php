<?php 

    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($connection, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($connection, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messeges LEFT JOIN users ON users.unique_id = messeges.outgoing_msg_id WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id') OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id') ORDER BY msg_id";
        $query = mysqli_query($connection, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    // sender
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'].'</p>
                                    </div>
                                </div>';
                }else{
                    // reciever
                    $output .= '<div class="chat incoming">
                                    <img src="php/storage/'. $row['image'] .'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'].'</p>
                                    </div>
                                </div>';
                }
            }

            echo $output;
        }
        
    }else{
        header("location: ../login.php");
    }

?>