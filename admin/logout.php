<?php 
    include "../config/constantsAdmin.php";

    //Destroy Session and redirect user back to Login Page
    session_destroy();

    header('location:'.SITEURL.'admin/login-panel.php');

?>