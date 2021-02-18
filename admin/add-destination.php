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
        <h1>Add Destination</h1>

        
        <?php
            //To echo to the manage destinations page
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

         <!-- Add Destination Form Starts -->
         <form action= "" method= "POST" enctype = "multipart/form-data">
            <table class ="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type = "text" name= "destination_name" placeholder = "Destination name">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name= "destination_desc" cols = "30" rows = "10" placeholder= "Description of the Destination"></textarea>
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
                        <input type = "text" name= "destination_alt" placeholder = "Alternate name for Image">
                    </td>
                </tr>

                <tr>
                    <td colspan = "2">
                        <input type = "submit" name = "submit" value= "Add Destination" class = "btn-secondary">
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
            $destination_name = $_POST['destination_name'];
            $destination_desc = $_POST['destination_desc'];
            $destination_image = $_POST['image']; 
            $destination_alt = $_POST['destination_alt'];

            //2. Upload the image if selected
            if($_FILES['image']['name'])
            {
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
                        header('location:'.SITEURL.'admin/add-destination.php');
                        //Stop the process
                        die();
                    }
                }
            }
            else
            {
                $destination_image = "";
            }

            //3. Uploading to Database
            $sql = "INSERT INTO destinations SET
                    destination_name = '$destination_name',
                    destination_desc = '$destination_desc',
                    destination_image = '$destination_image',
                    destination_alt = '$destination_alt'
                    ";

            //Execute Query
            $res = mysqli_query($connect, $sql);

            //Checking Data Insertion
            if($res == true)
            {
                //Data inserted successfully
                $_SESSION['add'] = "<div class = 'success'> Destination Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-destinations.php');
            }
            else
            {
                //Failed
                $_SESSION['add'] = "<div class = 'error'>Failed to add Destination.</div>";
                header('location:'.SITEURL.'admin/manage-destinations.php');
            }
            //4. Redirect with message to manage destination page
        }
    
    ?>
    

    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>

</html>