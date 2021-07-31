<?php

    include_once "config.php";

    $CREATE_TABLE = "CREATE TABLE IF NOT EXISTS messeges (
        msg_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        incoming_msg_id INT(255) NOT NULL,
        outgoing_msg_id INT(255) NOT NULL,
        msg VARCHAR(1000) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    //mysqli_query($connection, $CREATE_TABLE);
    $statement = $connection->prepare($CREATE_TABLE);
    $statement->execute();
    $statement->close();

    $CREATE_TABLE1 = "CREATE TABLE IF NOT EXISTS users (
        user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        unique_id INT(200) NOT NULL,
        fname VARCHAR(255) NOT NULL,
        lname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        image VARCHAR(255) NOT NULL,
        status VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    //mysqli_query($connection, $CREATE_TABLE);
    $statement = $connection->prepare($CREATE_TABLE1);
    $statement->execute();
    $statement->close();
?>