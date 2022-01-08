<?php

// Database connection
require_once 'config.php';

// Escape user inputs for security
$emp_no = $mysqli->real_escape_string($_REQUEST['emp_no']);
$type = $mysqli->real_escape_string($_REQUEST['type']);
$first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
$last_name = $mysqli->real_escape_string($_REQUEST['last_name']);
$contact_no = $mysqli->real_escape_string($_REQUEST['contact_no']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$username = $mysqli->real_escape_string($_REQUEST['username']);
$password = $mysqli->real_escape_string($_REQUEST['password']);




// Attempt insert query execution
$sql1 = "SELECT emp_no FROM employee WHERE emp_no = $emp_no";

$result = $mysqli->query($sql1);
if ($result->num_rows > 0) { // check for existing of the query
    header("Location: http://localhost/slt.lk/add_user_inter.php?message=unsuccess");
    exit();
} else {
    $sql = "INSERT INTO employee (emp_no, type, first_name, last_name, contact_no, email, username, password)
 VALUES ('$emp_no', '$type', '$first_name', '$last_name','$contact_no','$email','$username','$password')";

    if ($mysqli->query($sql) === true) {
        header("Location: http://localhost/slt.lk/add_user_inter.php?message=success");

        exit();
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }
}


// Close connection
$mysqli->close();
