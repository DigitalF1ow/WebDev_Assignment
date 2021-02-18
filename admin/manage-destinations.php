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

        <a href = "<?php echo SITEURL; ?>admin/add-destination.php" class = "btn-primary">Add Destinations</a>
        
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

            if(isset($_SESSION["no-destination"]))
            {
                echo $_SESSION["no-destination"];
                unset($_SESSION['no-destination']);
            }

            if(isset($_SESSION["update"]))
            {
                echo $_SESSION["update"];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION["remove"]))
            {
                echo $_SESSION["remove"];
                unset($_SESSION['remove']);
            }
        ?>

        <table class = "tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Alternate Image Name</th>
                <th>Actions</th>
                
            </tr>

            <?php

                $sql = "SELECT * FROM destinations";

                //Execute Query
                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                //Check whether we have in data in database
                if ($count > 0)
                {
                    //Display all these data
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $destination_id = $row['destination_id'];
                        $dest_name = $row['destination_name'];
                        $dest_desc = $row['destination_desc'];
                        $dest_image = $row['destination_image'];
                        $dest_alt = $row['destination_alt'];

                        ?>

                        <tr>
                            <td><?php echo $destination_id;?></td>
                            <td><?php echo $dest_name; ?></td>
                            <td><?php echo $dest_desc; ?></td>
                            <td><img src="<?php echo SITEURL;?>images/destinations/<?php echo $dest_image;?>" width="100px"></td>
                            <td><?php echo $dest_alt; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-destination.php?destination_id=<?php echo $destination_id;?>" class="btn-secondary">Edit Destination</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-destination.php?destination_id=<?php echo $destination_id;?>&image_name=<?php echo $dest_image; ?>" class="btn-danger">Delete Destination</a>
                            </td>
                        </tr>


                        <?php
                        
                    }
                    
                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No destinations is added</div></td>
                    </tr>
                    <?php
                }

            ?>

        </table>

    </section>
    

    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>


</html>