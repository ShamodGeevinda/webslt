<?php

$mysqli = new mysqli("localhost", "root", "", "slt");
// username, password, database name

if ($mysqli === false){
    die("ERROR: Could not connect. ". $mysqli->connect_error);
}


?>