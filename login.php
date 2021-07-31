<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>TK2</header>
            <form action="#">
                <div class="error-txt"></div>

                    <div class="field input">
                        <label>Email Address </label>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>

                    <div class="field input">
                        <label>Password </label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <i class="fa fa-eye"></i>
                    </div>

                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>

                    <div class="link">
                        Not yet signup? <a href="index.php">Signup now</a>
                    </div>
                
            </form>
        </section>
    </div>
    

    <script src="Javascript/pass-show-hide.js"></script>
    <script src="Javascript/login.js"></script>
</body>
</html>