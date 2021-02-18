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

        <br><br>

        <!-- Button to Add Admin -->
        <a href = "<?php echo SITEURL; ?>admin/add-activity.php" class = "btn-primary"> Add Activity</a>

        <?php
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
                <th>No.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Alternate Image Name</th>
                <th>Actions</th>
            </tr>
        
        <?php
            //Create a SQL Query to Get all the activity
            $sql = "SELECT * FROM activities";

            //Execute the query
            $res = mysqli_query($connect, $sql);

            //Count rows to check whether we have activities or not
            $count = mysqli_num_rows($res);


            if($count>0)
            {
                //We have activities in database
                //Get the activities from database and display
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values from individual columns
                    $id = $row['activity_id'];
                    $activity_name = $row['activity_name'];
                    $activity_desc = $row['activity_desc'];
                    $activity_image = $row['activity_image'];
                    $activity_alt = $row['activity_alt'];
                    ?>
                    
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $activity_name; ?></td>
                        <td><?php echo $activity_desc; ?></td>
                        <td><?php 
                                //Check whether image exist
                                if($activity_image=="")
                                {
                                    echo "<div class='error'>Image not added.</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/activities/<?php echo $activity_image?>" width= "100px">
                                    <?php
                                }
                            ?>
                        <td><?php echo $activity_alt; ?></td>
                        <td>
                            <a href = "#" class = "btn-secondary">Edit Activity</a>
                            <a href = "<?php echo SITEURL; ?>admin/delete-activity.php?id=<?php echo $id; ?>&activity_image=<?php echo $activity_image;?>" class = "btn-danger">Delete Activity</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            else
            {
                //food not added in database
                echo "<tr><td colspan-'7' class-'error'> Activity not added yet.</td></tr>";
            }
            
        ?>
        </table>
    </section>
    <!--End of the main content-->
    <?php include 'partials/footer.php' ?>
</body>
</html>