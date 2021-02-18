<?php
    include('../config/constantsAdmin.php');
    if(isset($_GET['activity_id']) && isset($_GET['activity_image'])) 
    {
        //Process to delete
        //echo "Process to delete";

        //Get ID and Activity image
        $activity_id = $_GET['activity_id'];
        $activity_image = $_GET['activity_image'];

        //Remove image if available
        if($activity_image != "")
        {
            //Got image and to be removed from folder
            //Get image path
            $path = "../images/activities/".$activity_image;

            //Remove image from the folder
            $remove = unlink($path);

            //Check whether the image is removed
            if($remove==false)
            {
                //Failed to remove image
                $_SESSION['upload'] = "<div class='error'> Failed to remove image file.</div>"; // this part kinda sus
                //Redirect to manage activities
                header('location:'.SITEURL.'admin/manage-activities.php');
                //Stop the process of deleting activities
                die();
            }

        }
        //Delete activity from database
        $sql = "DELETE FROM activities WHERE activity_id=$activity_id";
        //Redirect to manage activities
        $res = mysqli_query($connect,$sql);

        //Check whether the query executed, set session message
        if($res==true)
        {
            //activities deleted
            $_SESSION['delete'] = "<div class = 'success'> Activity Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-activities.php');
        }
        else
        {
            //Failed to delete
            $_SESSION['delete'] = "<div class = 'error'> Failed to Delete Activity..</div>";
            header('location:'.SITEURL.'admin/manage-activities.php');
            
        }
    }
    else
    {
        //Redirect to manage activities page
        //echo "Redirect";
        $_SESSION['unauthorize']  = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-activities.php');
    }
?>