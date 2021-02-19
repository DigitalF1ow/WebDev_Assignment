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
        <h1>Manage Reservations</h1>

        <?php
            if(isset($_SESSION["add"]))
            {
                echo $_SESSION["add"];
                unset($_SESSION["add"]);
            }

            if(isset($_SESSION["upload"]))
            {
                echo $_SESSION["upload"];
                unset($_SESSION['upload']);
            }
            
            if(isset($_SESSION["delete"]))
            {
                echo $_SESSION["delete"];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION["unauthorize"]))
            {
                echo $_SESSION["unauthorize"];
                unset($_SESSION['unauthorize']);
            }
            
        ?>

        <table class = "tbl-full">
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>IC Number</th>
                <th>Email</th>
                <th>Area Code</th>
                <th>Phone Number</th>
                <th>Tour</th>
                <th>Meeting Date</th>
                <th>Num Adults</th>
                <th>Num Child</th>
                <th>Actions</th>
            </tr>

            <?php

                $sql = "SELECT * FROM form";

                //Execute Query
                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                //Check whether we have in data in database
                if ($count > 0)
                {
                    //Display all these data
                    while($row = mysqli_fetch_assoc($res))
                    {
                        ?>

                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['ic']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['area_code']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['tour']; ?></td>
                            <td><?php echo $row['meeting_date']; ?></td>
                            <td><?php echo $row['numAdult']; ?></td>
                            <td><?php echo $row['numChild']; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-reservation.php?id=<?php echo $row['id'];?>" class="btn-secondary">Update Form</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-reservation.php?id=<?php echo $row['id'];?>" class="btn-danger">Delete Form</a>
                            </td>
                        </tr>


                        <?php
                        
                    }
                    
                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="12"><div class="error">No reservations is added</div></td>
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