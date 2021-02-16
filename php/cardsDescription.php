<?php

    include '../config/constants.php';

    $index = 0;
    $sql = "SELECT *  FROM tbl_destinations";

    
    //Executing Query
    $res = mysqli_query($conn, $sql);
    
    //Count number of rows available
    $count = mysqli_num_rows($res);

    if ($index/2 == 0)
    {
        echo "<div class='card card1'></div>";
        echo "<section class='leftside'>";
        echo "<h1>".$index."</h1>";
        echo "<p>Sunway Lagoon is the one-stop place for fun over 90 attractions spread across 88 acres, Sunway Lagoon provides the ultimate theme park experience in 6 adventure zones.</p>";
        echo "</section>";
    }
    else
    {
        echo "<div class='card card2 mobile'></div>";
        echo "<section class='rightside'>";
        echo "<h1>If you want to view the city from a bird's eye view, check out the Petronas Twin Towers.</h1>";
        echo "<p>Petronas Twin Towers is a multipurpose development area in Kuala Lumpur, Malaysia. The area is located around Jalan Ampang, Jalan P. Ramlee, Jalan Binjai, Jalan Kia Peng and Jalan Pinang. There are also hotels within walking distance such as G Tower, Mandarin Oriental, Grand Hyatt Kuala Lumpur and InterContinental Kuala Lumpur."; 
        echo "</p>";
        echo "</section>";
        echo "<div class='card card2 desktop'></div>";
    }
    


?>