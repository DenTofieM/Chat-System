<?php 

    while($row = mysqli_fetch_array($sql1)){
        $sql2 = "SELECT * FROM messeges WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_array($query2);
        $GLOBALS['flag1'] = 1;
        $GLOBALS['you'] = "";
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $GLOBALS['flag1'] = 0;
            $result = "No message available";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 28)."..." : $msg = $result;

        if($GLOBALS['flag1'] == 1){
            if($outgoing_id == $row2['outgoing_msg_id']) $GLOBALS['you'] = "You: ";
        }
         //($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "" ;

        ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
        

        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                            <img src="php/storage/'.$row['image'].'" alt="">
                            <div class="details">
                                <span>'.$row['fname']." ".$row['lname'].'</span>
                                <p>'. $GLOBALS['you'] . $msg.'</p>
                            </div>
                        </div>
                        <div class="status-dot '.$offline.'">
                            <i class="fa fa-circle"></i>
                        </div>
                    </a>';

    }
?>