<?php

    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // check email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // if email is valid
            // now check this email is already exits or not
            $sql = mysqli_query($connection, "SELECT email FROM users WHERE email = '$email'");
            if(mysqli_num_rows($sql) > 0){
                // email is already exits in this database
                echo $email." - already exist!!";
            }else{
                // check user upload image file or not
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extentions = ['png', 'jpeg', 'jpg'];

                    if(in_array($img_ext, $extentions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "storage/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);

                            // insert data in database
                            $sql2 = mysqli_query($connection, "INSERT INTO users(unique_id, fname, lname, email, password, image, status) VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if($sql2){
                                $sql3 = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_array($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }else{
                                echo "Something went wrong!";
                            }
                        }
                    }else{
                        echo "Please select an Image file - jpeg, jpg, png!";
                    }
                    
                }else{
                    echo "Please select an Image file!";
                }
            }

        }else{
            echo $email." - This is not valid email address";
        }

    }else{
        echo "All input field are required!";
    }
    
?>