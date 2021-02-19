<?php include "../config/constantsAdmin.php"?>
<html>
    <head>
        <title>Login - Administrator Tourism Panel</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>

        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>

        <!--Login Section Starts Here-->

        <form action="" method="POST" class="text-center">
        User name:<br>
        <input type="text" name="username" placeholder="Enter username here"><br><br>
        Password: <br>
        <input type="password" name="password" placeholder="Enter password here"><br><br>

        <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>

        <p class="text-center">Created by Darren Abbot</p>
    </div>
</body>
</html>

<?php
    //Check whether the Submit button is activated
    if (isset($_POST['submit']))
    {
        //Process for Login
        //1. Get Data from The login form, md5 the encryption password
        echo $username = $_POST['username'];
        echo $password = $_POST['password'];

        //Check SQL if username and password existed in Database
        $sql = "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'";

        //3. Execute the Query
        $res = mysqli_query($connect, $sql);

        //4. Count and see if user exist
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //User available, logins immediately
            $_SESSION['user'] = $username; //To be used for validation for the user session checked or not
            $_SESSION['login'] = "<div class='login-success'>Login Successful.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        else if ($_SESSION['no-login-message'])
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        else
        {
            //User not available and logins fails
            $_SESSION['login'] = "<div class='login-failed'>Username or Password not match.</div>";
            header('location:'.SITEURL.'admin/login-panel.php');
        }
    }


?>