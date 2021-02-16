<?php

    
    $index = 0;

    //Selecting all destinations from the table
    $sql = "SELECT *  FROM destinations";
    
    //Executing Query
    $res = mysqli_query($connect, $sql);
    
    //Finding the No. of Rows collected
    $count = mysqli_num_rows($res);
    $index = 1;

    if ($count > 0)
    {
        //Printing all the destinations in the table
        while($row = mysqli_fetch_assoc($res))
        {

            if ($index % 2 == 0)
            {
                $image = $row['destination_image'];
                //get and print the values from individual columns
                ?>
                <div style="background-image: url(images/<?php echo $image ?>)" class='card mobile' ></div>
                
                <?php
                echo "<section class='rightside'>";
                echo "<h1>".$row['destination_name']."</h1>";
                echo "<p>".$row['destination_desc']."</p>";
                echo "</section>";
                ?>

                <div style="background-image: url(images/<?php echo $image ?>)" class='card desktop' ></div>
                <?php
            }
            else
            {
                $image = $row['destination_image'];
                //get and print the values from individual columns
                ?>
                <div style="background-image: url(images/<?php echo $image ?>)" class='card' ></div>
                <?php
                echo "<section class='leftside'>";
                echo "<h1>".$row['destination_name']."</h1>";
                echo "<p>".$row['destination_desc']."</p>";
                echo "</section>";
            }
            $index++;
            
            
        }
    }
    else
    {
        //There are no destinations in the database
        echo "<h1 style='text-align: center;'>There are no destinations added into the website for now! Please come back again later!</h1>";
    }

?>