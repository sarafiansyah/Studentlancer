<?php
require_once("../include/initialize.php");

// Create a new instance of the Database class
$mydb = new Database();

// Retrieve form data
$userid = $mydb->escape_value($_POST['userid']);
$fullname = $mydb->escape_value($_POST['fullname']);
$username = $mydb->escape_value($_POST['username']);
$password = sha1($mydb->escape_value($_POST['password'])); // Encrypt the password using SHA1
$role = $mydb->escape_value($_POST['role']);
$piclocation = $mydb->escape_value($_POST['piclocation']);

// Insert into tblusers
$query = "INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES ('$userid', '$fullname', '$username', '$password', '$role', '$piclocation')";
$mydb->setQuery($query);
$result = $mydb->executeQuery();

if ($result) {
    // Registration successful
    echo "User registered successfully!";
} else {
    // Registration failed
    echo "Error: " . $mydb->error_msg;
}

// Close the database connection
$mydb->close_connection();
