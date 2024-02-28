<?php
session_start();
include('./function.php');
if(isset($_POST['logout'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_user']);

 set_message("You are successfully logged out...");
    header('location: ./index.php');
    exit(0);
}