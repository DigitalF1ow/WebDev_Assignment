
<?php
	include "../config/constants.php";
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$ic = $_POST['ic'];
	$email = $_POST['email'];
    $area_code = $_POST['area_code'];
	$phone_number = $_POST['phone_number'];
    $tour = $_POST['tour'];
    $numAdult = $_POST['numAdult'];
	$numChild = $_POST['numChild'];
	
	if ($first_name == "" || $last_name == "" || $ic == "" || $email == "" || $area_code == "" || $phone_number == "" || $tour == "" || $numAdult == "" || $numChild == "")
	{
		$_SESSION['validation-failed'] = "<script>alert('Your form is incomplete. Please fill up the entire form')</script>";
		header('location:'.SITEURL.'planTrip.php');
		die();
		
	}

	include "cost-Calculator.php";


	// Database connection
	$conn = new mysqli('localhost','root','','tourism-database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into form(first_name, last_name, ic, email, area_code, phone_number, tour, numAdult, numChild) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiisii", $first_name, $last_name, $ic, $email, $area_code, $phone_number, $tour, $numAdult, $numChild);
		$stmt->execute();
		//$_SESSION['add'] = 	"<div>Reservation Done!</div>";	
        //header('location:'.SITEURL.'planTrip.php');
		
		$stmt->close();
		$conn->close();
	}
?>