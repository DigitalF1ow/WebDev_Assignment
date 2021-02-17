<!DOCTYPE html>
<html>
<head>
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <title>Home - Administrator Panel</title>
    <link rel="stylesheet" href="../css/admin.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'partials/header.php'?>

    <!--Make it to become a grid size while expand or smaller the screen-->
    <section class="main-content">
        <h1>Dashboard</h1>
        <p>Welcome to the Administrator Panel. Below here are the number of items that are available in each table.</p>
        
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        
        <div class="wrapper">
            <div class = "col-4">
                <h1>Numbers</h1>
                <br/>
                Activities
            </div>

            <div class = "col-4">
                <h1>Numbers</h1>
                <br/>
                Destinations
            </div>

            <div class = "col-4">
                <h1>Numbers</h1>
                <br/>
                Reservations
            </div>

        </div>
        <!-- Used PHP Function for count num of Categories-->
        
        <div class="clearfix"></div>

    </section>
    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>


</html>
