<!DOCTYPE html>
<html>
<head>
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <title>Home - Administrator Panel</title>
    <link rel="stylesheet" href="../css/admin.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'partials/header.php' ?>
    
    <section class="main-content ">
        <h1>Update Destination</h1>


        <?php 
            //Check if ID has been set or not
            if(isset($_GET['destination_id']))
            {
                //Get all the info from the database
                $destination_id = $_GET['destination_id'];

                $sql = "SELECT * FROM destinations WHERE destination_id = $destination_id";

                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1)
                {
                    //Get all data
                    $row = mysqli_fetch_assoc($res);
                    $destination_name = $row['destination_name'];
                    $destination_desc = $row['destination_desc'];
                    $current_destination_image = $row['destination_image'];
                    $destination_alt = $row['destination_alt'];
                }
                else
                {
                    //Redirect back
                    $_SESSION['no-destination'] = "<div class = 'error'> Destination Non-existent.</div>";
                    header('location:'.SITEURL.'admin/manage-destinations.php');
                }
            } 
            else
            {
                header('location:'.SITEURL.'admin/manage-destinations.php');
            }
        ?>
        
         <!-- Add Destination Form Starts -->
         <form class="info-form" action= "" method= "POST" enctype = "multipart/form-data">
            <table>
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type = "text" name= "destination_name" value="<?php echo $destination_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name= "destination_desc" cols = "30" rows = "10"><?php echo $destination_desc; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php

                            if($current_destination_image != "")
                            {
                               //Display image
                               ?>
                               <img src="<?php echo SITEURL;?>images/destinations/<?php echo $current_destination_image;?>" width="100px">
                               <?php

                            }
                            else
                            {
                                //Display Message
                                echo "<div class = 'error'>Image Not Added.</div>";
                            }
                        
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Upload New Image: </td>
                    <td>
                        <input type = "file" name= "image">
                    </td>
                </tr>

                <tr>
                    <td>Image Name: </td>
                    <td>
                        <input type = "text" name= "destination_alt" value="<?php echo $destination_alt; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan = "2">
                        <input type="hidden" name="current_image" value= "<?php echo $current_destination_image; ?>">
                        <input type="hidden" name="dest_id" value= "<?php echo $destination_id; ?>">
                        <input type = "submit" name = "submit" value= "Update Destination" class = "btn-secondary">
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
            $destination_id = $_POST["dest_id"];
            $destination_name = $_POST['destination_name'];
            $destination_desc = $_POST['destination_desc'];
            $destination_image = $_POST['current_image']; 
            $destination_alt = $_POST['destination_alt'];

            //2. Upload the image if selected
            if($_FILES['image']['name'])
            {
                //Getting image details
                $destination_image = $_FILES['image']['name'];
                
                //See if image is selected or not and only upload the image when selected
                if ($destination_image != "")
                {
                    ///Get the extension of selected image (jpg.png.gif etc..)
                    $ext = end(explode('.', $destination_image));

                    //Create New Name for Image
                    $destination_image = "Destination-Name-".rand(0000,9999).".".$ext;

                    //Upload the image
                    //Get Src Path and Destination Path

                    //Src Path
                    $src= $_FILES['image']['tmp_name'];
                    //Destination path
                    $dst = "../images/destinations/".$destination_image;

                    //File Upload Process
                    $upload = move_uploaded_file($src, $dst);

                    //Check whether image uploaded of not
                    if($upload==false)
                    {
                        //Failed to upload the image
                        //Redirect to add destination page with error message
                        $_SESSION['upload'] = "<div class = 'error'>Failed to upload image. Please contact the software developer for more information</div>";
                        header('location:'.SITEURL.'admin/manage-destinations.php');
                        //Stop the process
                        die();
                    }

                    //Remove the old image
                    

                    //Remove image if available
                    if ($current_destination_image != "")
                    {
                        $remove_path = "../images/destinations/".$current_destination_image;
                        $remove = unlink($remove_path);

                        //Get the error message for remove image
                        if ($remove == false)
                        {
                            //Set the session Message, redirect to manage destination category, stop process
                            $_SESSION['upload'] = "<div class = 'error'>Failed to remove old image.</div>";
                            header('location:'.SITEURL.'admin/manage-destinations.php');
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
                    $destination_image = $current_destination_image;
                }
            }
            else
            {
                $destination_image = $current_destination_image;
            }

            //Update Database
            $sqlNew = "UPDATE destinations SET
                    destination_name = '$destination_name',
                    destination_desc = '$destination_desc',
                    destination_image = '$destination_image',
                    destination_alt = '$destination_alt'
                    WHERE destination_id = $destination_id ";

            //Execute Query
            $res = mysqli_query($connect, $sqlNew);

            //Checking Data Update
            if($res == true)
            {
                //Data updated successfully
                $_SESSION['update'] = "<div class = 'success'> Destination Update Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-destinations.php');
            }
            else
            {
                //Failed
                $_SESSION['update'] = "<div class = 'error'>Failed to Update Destination.</div>";
                header('location:'.SITEURL.'admin/manage-destinations.php');
            }
        }    
    
    ?>

    <?php include 'partials/footer.php' ?>

</body>
</html>