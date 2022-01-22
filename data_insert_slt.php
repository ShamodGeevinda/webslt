<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
  server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "1234", "slt");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Escape user inputs for security
$serial_no = $mysqli->real_escape_string($_REQUEST['serial_no']);
$type = $mysqli->real_escape_string($_REQUEST['type']);
$entered_by = $mysqli->real_escape_string($_REQUEST['entered_by']);
$entered_date = $mysqli->real_escape_string($_REQUEST['entered_date']);
$item_status = $mysqli->real_escape_string($_REQUEST['item_status']);

// Check serial no: already taken
$sql_serial = "SELECT * FROM slt WHERE serial_no='$serial_no'";
$sql_serial = mysqli_query($mysqli, $sql_serial);

if (mysqli_num_rows($sql_serial) > 0){
    
    $serial_error = "<script>window.alert('Sorry... serial no already taken');</script>";
    echo $serial_error;
    header("Location: http://localhost/slt.lk/insert_slt_inter.php?message1=success");
}

else{
    


// Attempt insert query execution
$sql = "INSERT INTO slt(serial_no, type, entered_by, entered_date,item_status) VALUES ('$serial_no', '$type', '$entered_by', '$entered_date','$item_status')";



if ($mysqli->query($sql) === true) {
    header("Location: http://localhost/slt.lk/insert_slt_inter.php?message=success");

    exit();
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();

}
