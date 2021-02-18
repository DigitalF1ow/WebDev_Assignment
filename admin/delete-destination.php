<?php

    include('../config/constantsAdmin.php');

    echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['destination_id']) AND ($_GET['image_name']))
    {
        //Get Value and Delete
        $destination_id = $_GET['destination_id'];
        $image_name = $_GET['image_name'];

        //Remove Physical Image file
        if($image_name != "")
        {
            //Image available, remove it
            $path = "../images/destinations/".$image_name;

            //Remove image
            $remove = unlink($path);

            //Get the error message for remove image
            if ($remove == false)
            {
                //Set the session Message, redirect to manage destination category, stop process
                $_SESSION['upload'] = "<div class = 'error'>Failed to remove image.</div>";
                header('location:'.SITEURL.'admin/manage-destinations.php');
                die();
            }
        }

        $sql = "DELETE FROM destinations WHERE destination_id = $destination_id";

        $res = mysqli_query($connect, $sql);

        //Checking Data Removal
        if($res == true)
        {
            //Data removed successfully
            $_SESSION['remove'] = "<div class = 'success'> Destination Removed Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-destinations.php');
        }
        else
        {
            //Failed
            $_SESSION['remove'] = "<div class = 'error'>Failed to remove Destination.</div>";
            header('location:'.SITEURL.'admin/manage-destinations.php');
        }
    }
    else
    {
        //Back to Manage Destination
        $_SESSION['remove'] = "<div class = 'error'>Failed to delete Destination.</div>";
        header('location:'.SITEURL.'admin/manage-destinations.php');
    }

?>