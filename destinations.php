<!DOCTYPE html>
<html>
<head>
    <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
    <title> Destinations - Visit Kuala Lumpur</title>
    
    <link rel="stylesheet" href="css/destinations.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php
        include 'php/responsiveLayout.php';
        echo responsiveHeader();
    ?>
    </div>

    <div class="banner-background">Places to Visit</div>

    <div class="container">
    <!--Changes will be made - Will be looped to make a number of destinations available using php/javascript-->
    <article class="destinations">

    <?php
        include 'php/cardsDescription.php';
    ?>
        
    </article>
    </div>

    <?php
        
        echo responsiveFooter();
    ?>

<script>

    function responsive()
    {
        var responsiveId = document.getElementById("navheader");
        if(responsiveId.className === "nav-header")
        {
            responsiveId.className += "-responsive";
        }
        else
        {
            responsiveId.className = "nav-header";
        }
        
    }
</script>
    
</body>
</html>