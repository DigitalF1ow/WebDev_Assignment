<!DOCTYPE html>
<html>
<head>
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <title> Fun Games & Activity - Visit Kuala Lumpur</title>
    <link rel="stylesheet" href = "css/funGames.css">
    <link rel="icon"  href="images/favicon1.ico" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon1.ico" />
</head>
<body>
    <div class = "container">
        <?php
            include 'php/responsiveHeader.php';
        ?>
    </div>
    <div class = "banner-background"> Fun Activity & Games</div>
    <div class = "container">
        <article class = "games">

        <?php
            include 'php/cardsActivities.php';
        ?>

        </article>
    </div>
    <?php
            include 'php/responsiveFooter.php';
        ?>
</body>
</html>