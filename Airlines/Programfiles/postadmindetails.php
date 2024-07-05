<?php 
    require_once "dbconnection.php"; // Assuming you have included your database connection script

	if(isset($_POST['submit'])) {
		$country = $_POST['country'];
		$state = $_POST['state'];
		$city = $_POST['source'];
		$airportname = $_POST['airportname'];
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$departure = $_POST['departure'];
		$arrival = $_POST['arrival'];
		$duration = $_POST['duration'];
		$airlinesid = $_POST['airlinesid'];
		$flightcode = $_POST['flightcode'];
		$date = $_POST['date'];
		$economyclass = $_POST['economyclass'];
		$businessclass = $_POST['businessclass'];
		$students = $_POST['students'];
		$diff = $_POST['diff'];
	
		// Prepare the SQL statement
		$sql = "INSERT INTO flight (SOURCE, DESTINATION, DEPARTURE, ARRIVAL, DURATION, FLIGHT_CODE, AIRLINE_ID, PRICE_BUSINESS, PRICE_ECONOMY, PRICE_STUDENTS, PRICE_DIFFERENTLYABLED, DATE, AIRPORTNAME) VALUES ('$source', '$destination', '$departure', '$arrival', '$duration', '$flightcode', '$airlinesid', '$businessclass', '$economyclass', '$students', '$diff', '$date', '$airportname')";
	
		// Execute the SQL statement
		if(mysqli_query($con, $sql)) {
			echo "Record inserted successfully.";
			// Redirect to index.php
			header("Location: viewflights.php");
			exit; // Ensure that no further output is sent
		} else {
			echo "Error inserting record: " . mysqli_error($con);
		}
		
	}
	
?>
