<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["first_name"]);
header("Location:index.php");
