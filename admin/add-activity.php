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
    <!--Make it to become a grid size while expand or smaller the screen-->
    <section class="main-content ">
        <h1>Add Activity</h1>
    </section>
    
    <!--<div class= "main-content">
    <div class= "wrapper">
            <h1> Add Activity</h1> -->

    
            <br><br>

            <?php
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>

            <!-- Add Category Form Starts -->
            <form action= "" method= "POST" enctype = "multipart/form-data">

                <table class ="tbl-30">
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type = "text" name= "activity_name" placeholder = "Activity name">
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name= "activity_desc" cols = "30" rows = "10" placeholder= "Descripton of the Activity"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type = "file" name= "image">
                        </td>
                    </tr>

                    <tr>
                        <td>Image Name: </td>
                        <td>
                            <input type = "text" name= "activity_alt" placeholder = "Alternate name for Image">
                        </td>
                    </tr>

                    <tr>
                        <td colspan = "2">
                            <input type = "submit" name = "submit" value= "Add Activity" class = "btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                //Check whether the button is clicked or not
                if(isset($_POST['submit']))
                {
                    //Add the activity in database
                    //echo "Clicked";
                    
                    //1. Get the data from form
                    $activity_name = $_POST['activity_name'];
                    $activity_desc = $_POST['activity_desc'];
                    $activity_image = $_POST['image']; 
                    $activity_alt = $_POST['activity_alt'];

                    //2. Upload the image if selected
                    //Check whether the selected image is clicked or not and upload the image only if the image is selected
                    if(isset($_FILES['image']['name']))
                    {
                        //Get the details of the selected image
                        $activity_image = $_FILES['image']['name'];

                        //Check whether the image is selected or not and upload image only if selected
                        if($activity_image!="")
                        {
                            // Image is selected
                            //A. Rename the image
                            ///Get the extension of selected image (jpg.png.gif etc..)
                            $ext = end(explode('.', $activity_image));

                            //Create new name for image
                            $activity_image = "Activity-Name-".rand(0000,9999).".".$ext;

                            //B. Upload the image
                            //Get the src path and destination path

                            // Source path is the current location of the image
                            $src= $_FILES['image']['tmp_name'];

                            //Destination path for the image to be uploaded
                            $dst = "../images/activities/".$activity_image;

                            //Finally upload the food image
                            $upload = move_uploaded_file($src, $dst);

                            //Check whether image uploaded of not
                            if($upload==false)
                            {
                                //Failed to upload the image
                                //Redirect to add activity page with error message
                                $_SESSION['upload'] = "<div class = 'error'>Failed to upload image.</div>";
                                header('location:'.SITEURL.'admin/add-activity.php');
                                //Stop the process
                                die();
                            }

                        }

                    }
                    else
                    {
                        $activity_image = ""; // setting default value
                    }

                    //3. Insert into database
                    //Create a SQL Query to Save or Add food
                    $sql = "INSERT INTO activities SET
                            activity_name = '$activity_name',
                            activity_desc = '$activity_desc',
                            activity_image = '$activity_image',
                            activity_alt = '$activity_alt'
                            ";
                    
                    //Execute the query
                    $res = mysqli_query($connect, $sql);
                    
                    //Check the data insertion
                    if($res == true)
                    {
                        //Data inserted successfully
                        $_SESSION['add'] = "<div class = 'success'> Activity Added Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-activities.php');
                    }
                    else
                    {
                        //Failed
                        $_SESSION['add'] = "<div class = 'error'>Failed to add food.</div>";
                        header('location:'.SITEURL.'admin/manage-activities.php');
                    }
                    //4. Redirect with message to manage activity page
                }    
            ?>
            <!-- Add Category Form Ends -->
    </div>

    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>
</html>




