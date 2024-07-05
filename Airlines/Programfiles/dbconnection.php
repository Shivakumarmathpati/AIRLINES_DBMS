<?php
// dbconnection.php

// Replace 'yourpassword' with your actual MySQL root password
$conn = mysqli_connect('localhost', 'root', 'yourpassword', 'dbms');

// Check connection
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}
?>
