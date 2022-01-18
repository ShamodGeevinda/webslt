<?php

require('config.php');

$id=$_REQUEST['id'];

$query = "DELETE FROM employee WHERE id=$id"; 

$result = mysqli_query($mysqli,$query) or die ( mysqli_error());

header("Location: delete_user_inter.php");
