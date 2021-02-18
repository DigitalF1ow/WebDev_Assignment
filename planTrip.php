<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking</title>
    <link href="css/form.css" rel="stylesheet">
    <link rel="icon" href="images/favicon1.ico" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "container">
        <?php
            include 'php/responsiveHeader.php';
        ?>
    </div>
    
    <?php
        if(isset($_SESSION["add"]))
        {
            echo $_SESSION["add"];
            unset($_SESSION['add']);
        }
    ?>
            
    <div class="regform">
        <h1> Tour Booking Form </h1>
    </div>
    <div class="main">
        
        <form action= "php/form.php" method="POST" autocomplete="off">
        <div id="name">
        <h2 class="name">Name </h2>

        <input class="firstname" type="text" name="first_name"><br>
        <label class="firstlabel">first name</label>
        <input class="lastname" type="text" name="last_name"><br>
        <label class="lastlabel">last name</label>

    </div>

    <h2 class="name"> IC/Passport No. </h2>
    <input class="ic" type="text" name="ic">
    <h2 class="name">Email</h2>

    <input class="email" type="email" name="email">

    <h2 class="name">Phone</h2>
    <input class="Code" type="text" name="area_code">
                <label class="area-code">Area Code</label>
                <input class="number" type="text" name="phone_number">
                <label class="phone-number">Phone Number</label>
        
        
    <h2 class="name">Tour</h2>
    <select class="option" name="tour">
        <option disabled="disabled" selected="selected" value="">--Choose option--</option>
        <option value = "tour1">Package A - Tour of the Cultural Ways</option>
        <option value = "tour2">Package B - Tour of the Fun Fantasies</option>
        <option value = "tour3">Package C - All in one Bombastica</option>
    </select>
    
    <h2 class="name">Meeting Date</h2>
    <input type="date" class ="meetingDate" name="meetingDate">
    </select>
        
    <h2 class="name"> Number of Travelers</h2>
    <select class="optionTravelers" name="numAdult">
                    <option disabled="disabled" selected="selected" value="">--Adult--</option>
                    <option value = "0">0</option>
                    <option value = "1">1</option>
                    <option value = "2">2</option>
                    <option value = "3">3</option>
                    <option value = "4">4</option>
                    <option value = "5">5</option>
                    <option value = "6">6</option>
                    <option value = "7">7</option>
                    <option value = "8">8</option>
                    <option value = "9">9</option>
                    <option value = "10">10</option>
                </select>
    <select class="optionTravelers" name="numChild">
                    <option disabled="disabled" selected="selected" value="">--Child--</option>
                    <option value = "0">0</option>
                    <option value = "1">1</option>
                    <option value = "2">2</option>
                    <option value = "3">3</option>
                    <option value = "4">4</option>
                    <option value = "5">5</option>
                    <option value = "6">6</option>
                    <option value = "7">7</option>
                    <option value = "8">8</option>
                    <option value = "9">9</option>
                    <option value = "10">10</option>
    </select>
    <div class = center>
        <button type="submit">Submit</button>
    </div>
    </form>
    </div>

    <?php
        include 'php/responsiveFooter.php';

        if(isset($_SESSION["validation-failed"]))
        {
            echo $_SESSION["validation-failed"];
            unset($_SESSION['validation-failed']);
        }
    ?>

</body>
</html>