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
    
    <section class="main-content ">
        <h1>Update Reservation</h1>

        <?php 
            //Check if ID has been set or not
            if(isset($_GET['id']))
            {
                //Get all the info from the database
                $reservation_id = $_GET['id'];

                $sql = "SELECT * FROM form WHERE id = $reservation_id";

                $res = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1)
                {
                    //Get all data
                    $row = mysqli_fetch_assoc($res);

                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $ic = $row['ic'];
                    $email = $row['email'];
                    $area_code = $row['area_code'];
                    $phone_number = $row['phone_number'];
                    $meeting_date = $row['meeting_date'];
                    $tour = $row['tour'];
                    $numAdult = $row['numAdult'];
                    $numChild = $row['numChild'];
                }
                else
                {
                    //Redirect back
                    $_SESSION['no-destination'] = "<div class = 'error'> Reservation Non-existent.</div>";
                    header('location:'.SITEURL.'admin/manage-reservations.php');
                }
            } 
            else
            {
                header('location:'.SITEURL.'admin/manage-reservations.php');
            }
        ?>

         <!-- Edit Reservation Form Starts -->
         <form class="info-form" action= "" method= "POST" enctype = "multipart/form-data">
            <table>
                <tr>
                    <td>First Name: </td>
                    <td>
                        <input type = "text" name= "reservation_fname" value="<?php echo $first_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Last Name: </td>
                    <td>
                        <input type = "text" name= "reservation_lname" value="<?php echo $last_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>IC Number: </td>
                    <td>
                        <input type = "text" name= "reservation_ic" value="<?php echo $ic; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type = "text" name= "reservation_email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Area: </td>
                    <td>
                        <input type = "text" name= "reservation_areacode" value="<?php echo $area_code; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Phone Number: </td>
                    <td>
                        <input type = "text" name= "reservation_phoneNumber" value="<?php echo $phone_number; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Tour: </td>
                    <td>
                        <input type = "text" name= "reservation_tour" value="<?php echo $tour; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Meeting Date: </td>
                    <td>
                        <input type = "date" name= "reservation_meeting" value="<?php echo $meeting_date; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Number of Adults: </td>
                    <td>
                        <input type = "text" name= "reservation_numAdults" value="<?php echo $numAdult; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Number of Children: </td>
                    <td>
                        <input type = "text" name= "reservation_numChildren" value="<?php echo $numChild; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan = "2">
                        <input type="hidden" name="reservation_id" value= "<?php echo $reservation_id; ?>">
                        <input type = "submit" name = "submit" value= "Update Reservation" class = "btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </section>

    <?php
        
        //Checking if button is clicked or not
        if(isset($_POST['submit']))
        {
            //Getting Data from Form
            $reservation_id = $_POST["reservation_id"];
            $first_name = $_POST['reservation_fname'];
            $last_name = $_POST['reservation_lname'];
            $ic = $_POST['reservation_ic']; 
            $email = $_POST['reservation_email'];
            $area_code = $_POST['reservation_areacode'];
            $phone_number = $_POST['reservation_phoneNumber'];
            $meeting_date = $_POST['reservation_meeting'];
            $tour = $_POST['reservation_tour'];
            $numAdult = $_POST['reservation_numAdults'];
            $numChild = $_POST['reservation_numChildren'];
           

            //Update Database
            $sqlNew = "UPDATE form SET
                    first_name = '$first_name',
                    last_name = '$last_name',
                    ic = '$ic',
                    email = '$email',
                    area_code = '$area_code',
                    phone_number = '$phone_number',
                    tour = '$tour',
                    meeting_date = '$meeting_date',
                    numAdult = '$numAdult',
                    numChild = '$numChild'
                    WHERE id = $reservation_id";

            //Execute Query
            $res = mysqli_query($connect, $sqlNew);

            //Checking Data Update
            if($res == true)
            {
                //Data updated successfully
                $_SESSION['update'] = "<div class = 'success'> Reservation Update Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-reservations.php');
            }
            else
            {
                //Failed
                $_SESSION['update'] = "<div class = 'error'>Failed to Update reservations.</div>";
                header('location:'.SITEURL.'admin/manage-reservations.php');
            }
        }    
    
    ?>

    <?php include 'partials/footer.php' ?>

</body>
</html>