<!DOCTYPE html>
<html>
<head>
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <title>Home - Administrator Panel</title>
    <link rel="stylesheet" href="../css/admin.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include('partials/header.php');?>

    <?php
        if(isset($_GET['activity_id']))
        {
            //Get all the details
            $activity_id = $_GET['activity_id'];

            //SQL Query to get the selected activities
            $sql = "SELECT * FROM activities WHERE activity_id = $activity_id"; //watch out

            //execute the query
            $res = mysqli_query($connect,$sql); 
            $count = mysqli_num_rows($res);

            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);

                //Get the individual values of selected activity
                $activity_name = $row['activity_name'];
                $activity_desc = $row['activity_desc'];
                $current_activity_image = $row['activity_image'];
                $activity_alt = $row['activity_alt'];
            }
            else
            {
                //Redirect back
                $_SESSION['no-destination'] = "<div class = 'error'> Destination Non-existent.</div>";
                header('location:'.SITEURL.'admin/manage-activities.php');
            }

        }
        else
        {
            header('location:'.SITEURL.'admin/manage-activities.php');
        }
    ?>

    <?php
    //To echo to the manage destinations page
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    ?>

    <section class="main-content">
            <h1>Update Activities</h1>

            <br><br>

            <form action= "" method= "POST" enctype = "multipart/form-data">

                <table class ="tbl-30">
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type = "text" name= "activity_name" value="<?php echo $activity_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name= "activity_desc" cols = "30" rows = "10" ><?php echo $activity_desc ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php
                            if($current_activity_image == "")
                            {
                                echo "<div class='error'> Image not available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src = "<?php echo SITEURL; ?>images/activities/<?php echo $current_activity_image; ?>" width = "100px">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Upload new image: </td>
                        <td>
                            <input type = "file" name = "image">
                        </td>
                    </tr>

                    <tr>
                        <td>Image Name: </td>
                        <td>
                            <input type = "text" name= "activity_alt" value="<?php echo $activity_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan = "2">
                            <input type="hidden" name="activity_image" value= "<?php echo $current_activity_image; ?>">
                            <input type="hidden" name="activity_id" value= "<?php echo $activity_id; ?>">
                            <input type = "submit" name = "submit" value= "Update Activity" class = "btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
    </section>

    <?php
        
        //Checking if button is clicked or not
        if(isset($_POST['submit']))
        {
            //Getting Data from Form
            $activity_id = $_POST["activity_id"];
            $activity_name = $_POST['activity_name'];
            $activity_desc = $_POST['activity_desc'];
            $activity_image = $_POST['activity_image']; 
            $activity_alt = $_POST['activity_alt'];

            //2. Upload the image if selected
            if($_FILES['image']['name'])
            {
                //Getting image details
                $activity_image = $_FILES['image']['name'];
                
                //See if image is selected or not and only upload the image when selected
                if ($activity_image != "")
                {
                    ///Get the extension of selected image (jpg.png.gif etc..)
                    $ext = end(explode('.', $activity_image));

                    //Create New Name for Image
                    $activity_image = "Activity-Name-".rand(0000,9999).".".$ext;

                    //Upload the image
                    //Get Src Path and Destination Path

                    //Src Path
                    $src= $_FILES['image']['tmp_name'];
                    //Destination path
                    $dst = "../images/activities/".$activity_image;

                    //File Upload Process
                    $upload = move_uploaded_file($src, $dst);

                    //Check whether image uploaded of not
                    if($upload==false)
                    {
                        //Failed to upload the image
                        //Redirect to add destination page with error message
                        $_SESSION['upload'] = "<div class = 'error'>Failed to upload image. Please contact the software developer for more information</div>";
                        header('location:'.SITEURL.'admin/manage-activities.php');
                        //Stop the process
                        die();
                    }

                    //Remove the old image
                    

                    //Remove image if available
                    if ($current_activity_image != "")
                    {
                        $remove_path = "../images/activities/".$current_activity_image;
                        $remove = unlink($remove_path);

                        //Get the error message for remove image
                        if ($remove == false)
                        {
                            //Set the session Message, redirect to manage destination category, stop process
                            $_SESSION['upload'] = "<div class = 'error'>Failed to remove old image.</div>";
                            header('location:'.SITEURL.'admin/manage-activities.php');
                            die();
                        }
                    }
                    else
                    {
                        $_SESSION['upload'] = "<div class = 'error'>No file to remove, continue uploading</div>";
                    }
                    
                }
                else
                {
                    $activity_image = $current_activity_image;
                }
            }
            else
            {
                $activity_image = $current_activity_image;
            }

            //Update Database
            $sqlNew = "UPDATE destinations SET
                    activity_name = '$activity_name',
                    activity_desc = '$activity_desc',
                    activity_image = '$activity_image',
                    activity_alt = '$activity_alt'
                    WHERE activity_id = $activity_id ";

            //Execute Query
            $res = mysqli_query($connect, $sqlNew);

            //Checking Data Update
            if($res == true)
            {
                //Data updated successfully
                $_SESSION['update'] = "<div class = 'success'> Destination Update Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-activities.php');
            }
            else
            {
                //Failed
                $_SESSION['update'] = "<div class = 'error'>Failed to Update Destination.</div>";
                header('location:'.SITEURL.'admin/manage-activities.php');
            }
        }    
    
    ?>

    <?php
        include('partials/footer.php');?>


</body>
</html>