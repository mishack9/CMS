<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = mysqli_connect($servername, $username, $password,  $dbname);
   if(!$conn)
   {
    header('location: ../error/db_error.php');
    die();
   }