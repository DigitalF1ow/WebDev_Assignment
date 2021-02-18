<?php

    include('../config/constantsAdmin.php');

    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']))
    {
        //Get Value and Delete
        $reservation_id = $_GET['destination_id'];

        $sql = "DELETE FROM form WHERE id = $reservation_id";

        $res = mysqli_query($connect, $sql);

        //Checking Data Removal
        if($res == true)
        {
            //Data removed successfully
            $_SESSION['remove'] = "<div class = 'success'> Reservation Removed Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-reservations.php');
        }
        else
        {
            //Failed
            $_SESSION['remove'] = "<div class = 'error'>Failed to remove Reservation.</div>";
            header('location:'.SITEURL.'admin/manage-reservations.php');
        }
    }
    else
    {
        //Back to Manage Destination
        $_SESSION['remove'] = "<div class = 'error'>Failed to delete Reservation.</div>";
        header('location:'.SITEURL.'admin/manage-reservations.php');
    }

?>