<?php
    require_once "dbconnection.php";
    $flight = ''; // Initialize $flight variable

    // Fetch the selected flight code from the 'selected' table
    $query = mysqli_query($con, "SELECT * FROM selected");
    $rows = mysqli_fetch_array($query);
    if ($rows) {
        $flight = $rows['FLIGHT_CODE'];
    } else {
        echo "<script>alert('No flight code selected.')</script>";
        echo "<script>window.location='modifyadmindetails.html'</script>";
    }

    if (isset($_POST['submit'])) {
        $count = 0;
        $flag = 0;

        // Check and update departure, arrival, and duration
        if (!empty($_POST['departure']) && !empty($_POST['arrival']) && !empty($_POST['duration'])) {
            $departure = $_POST['departure'];
            $arrival = $_POST['arrival'];
            $duration = $_POST['duration'];
            $sql = "UPDATE flight SET DEPARTURE='$departure', ARRIVAL='$arrival', DURATION='$duration' WHERE FLIGHT_CODE='$flight'";
            if (mysqli_query($con, $sql)) {
                $count = 1;
            } else {
                echo "<script>alert('Error updating departure, arrival, and duration.')</script>";
            }
        } else {
            echo "<script>alert('Enter values for Departure, Arrival, and Duration.')</script>";
        }

        // Update business class price
        if (!empty($_POST['businessclass'])) {
            $businessclass = $_POST['businessclass'];
            $sql = "UPDATE flight SET PRICE_BUSINESS='$businessclass' WHERE FLIGHT_CODE='$flight'";
            if (mysqli_query($con, $sql)) {
                $flag++;
            } else {
                echo "<script>alert('Error updating business class price.')</script>";
            }
        }

        // Update economy class price
        if (!empty($_POST['economyclass'])) {
            $economyclass = $_POST['economyclass'];
            $sql = "UPDATE flight SET PRICE_ECONOMY='$economyclass' WHERE FLIGHT_CODE='$flight'";
            if (mysqli_query($con, $sql)) {
                $flag++;
            } else {
                echo "<script>alert('Error updating economy class price.')</script>";
            }
        }

        // Update students price
        if (!empty($_POST['students'])) {
            $students = $_POST['students'];
            $sql = "UPDATE flight SET PRICE_STUDENTS='$students' WHERE FLIGHT_CODE='$flight'";
            if (mysqli_query($con, $sql)) {
                $flag++;
            } else {
                echo "<script>alert('Error updating students price.')</script>";
            }
        }

        // Update differently abled price
        if (!empty($_POST['diff'])) {
            $diff = $_POST['diff'];
            $sql = "UPDATE flight SET PRICE_DIFFERENTLYABLED='$diff' WHERE FLIGHT_CODE='$flight'";
            if (mysqli_query($con, $sql)) {
                $flag++;
            } else {
                echo "<script>alert('Error updating differently abled price.')</script>";
            }
        }

        // Delete the selected flight code from the 'selected' table
        $sql = "DELETE FROM selected WHERE FLIGHT_CODE='$flight'";
        if (mysqli_query($con, $sql)) {
            // Check if all updates were successful
            if ($count == 1 || $flag > 0) {
                echo "<script>alert('Data Modified Successfully')</script>";
                echo "<script>window.location='homepage.html'</script>";
            } else {
                echo "<script>alert('No data was modified.')</script>";
                echo "<script>window.location='modifyadmindetails.html'</script>";
            }
        } else {
            echo "<script>alert('Error deleting selected flight code.')</script>";
            echo "<script>window.location='modifyadmindetails.html'</script>";
        }
    }
?>
