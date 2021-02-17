<?php
    //Login Authorization
    //Check if login user is validated

    if(!isset($_SESSION['user'])) //if user session is not set
    {

        //User is not logged in and Redirect back to the login page with a page
        $_SESSION['no-login-message'] = "<div class='login-failed'>You are not logged in.</div>";
        header('location:'.SITEURL.'admin/login-panel.php');
    }

?>