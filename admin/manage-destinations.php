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
        <h1>Manage Destinations</h1>

        <br><br>

        <a href = "<?php echo SITEURL; ?>admin/add-destination.php" class = "btn-primary"> Add Destinations</a>
        
        <?php
            //Getting the session echo from the add-destinations
            if(isset($_SESSION["add"]))
            {
                echo $_SESSION["add"];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION["upload"]))
            {
                echo $_SESSION["upload"];
                unset($_SESSION['upload']);
            }
        ?>

        <table class = "tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Alternate Image Name</th>
            </tr>
        </table>

    </section>
    

    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>


</html>