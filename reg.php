<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>TK2</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name </label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>

                    <div class="field input">
                        <label>Last Name </label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>

                    <div class="field input">
                        <label>Email Address </label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="field input">
                        <label>Password </label>
                        <input type="password" name="password" placeholder="Enter new password" required>
                        <i class="fa fa-eye"></i>
                    </div>

                    <div class="field image">
                        <label>Select Image </label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>

                    <div class="link">
                        Already signup? <a href="login.php">Login now</a>
                    </div>
                
            </form>
        </section>
    </div>
    
    <script src="Javascript/pass-show-hide.js"></script>
    <script src="Javascript/signup.js"></script>
</body>
</html>