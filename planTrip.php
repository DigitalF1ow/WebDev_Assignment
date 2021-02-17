<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking</title>
    <link href="css/form.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class = "container">
        <?php
            include 'php/responsiveHeader.php';
        ?>
    </div>
    
    <div class="regform">
        <h1>
 Tour Booking Form</h1>
</div>
<div class="main">
    
        <form action= "php/form.php" method="POST">
            <div id="name">
                <h2 class="name">
Name </h2>
<input class="firstname" type="text" name="first_name"><br>
                <label class="firstlabel">first name</label>
                <input class="lastname" type="text" name="last_name"><br>
                <label class="lastlabel">last name</label>
            </div>
            <h2 class="name">
IC/Passport No. </h2>
<input class="ic" type="text" name="ic">
            <h2 class="name">
Email</h2>
<input class="email" type="email" name="email">
            <h2 class="name">
Phone</h2>
<input class="Code" type="text" name="area_code">
            <label class="area-code">Area Code</label>
            <input class="number" type="text" name="phone_number">
            <label class="phone-number">Phone Number</label>
    
    
            <h2 class="name">
Tour</h2>
<select class="option" name="tour">
                <option disabled="disabled" selected="selected">--Choose option--</option>
                <option>Tour 1</option>
                <option>Tour 2</option>
                <option>Tour 3</option>
            </select>
<!-- 
            <h2 class="name">
Meeting Date</h2>
            <input type="date" id="meetingDate" name="meetingDate">
            </select>
            -->
            <h2 class="name"> 
Number of Travelers</h2>
<select class="optionTravelers" name="numAdult">
                <option disabled="disabled" selected="selected">--Adult--</option>
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
                <option disabled="disabled" selected="selected">--Child--</option>
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

            <!--<h2 id="coustomer">
                
Are you beginner?</h2>
<label class="radio">
                <input class="radio-one" type="radio" checked="checked" name="rdiobtn">
                <span class="checkmark"></span>
                Yes
            </label>
    
            <label class="radio">
                <input class="radio-two" type="radio" name="rdiobtn">
                <span class="checkmark"></span>
                No
            </label>
    -->
    <div class = center>
            <button type="submit">Submit</button>
    </div>
        </form>
</div>
<div class = "container">
    <?php
        include 'php/responsiveFooter.php';
    ?>
</div>
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