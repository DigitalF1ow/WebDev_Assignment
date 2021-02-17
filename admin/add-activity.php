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

            <!-- Add Category Form Starts -->
            <form action= "" method= "POST">

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
                            <input type = "file" name= "activity_image">
                        </td>
                    </tr>

                    <tr>
                        <td>Image Name: </td>
                        <td>
                            <input type = "text" name= "activity_alt" placeholder = "Alternate name for Image">
                        </td>
                    </tr>


                </table>
            </form>
            <!-- Add Category Form Ends -->
    </div>

    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>





