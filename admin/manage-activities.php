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
    <section class="main-content">
        <h1>Manage Activities</h1>
    </section>

    <br /><br />

        <!-- Button to Add Admin -->
        <a href = "<?php echo SITEURL; ?>admin/add-activity.php" class = "btn-primary"> Add Activity</a>

        <br /><br /><br />

        <?php
            if(isset($_SESSION["add"]))
            {
                echo $_SESSION["add"];
                unset($_SESSION['add']);
            }
        ?>

        <table class = "tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
            </tr>

    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>
</html>