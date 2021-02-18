<?php
    //Start Session
    session_start();


    //For Connecting to the Database. Easier to handle files and storing data in tables
    //Declaring Constants 
    define('SITEURL', 'http://localhost/Webdev_Assignment/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'tourism-database');

    $connect = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($connect, DB_NAME) or die(mysqli_error());
?>