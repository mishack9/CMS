<?php
session_start();
include('./configuration/connection.php');
if(!isset($_SESSION['auth'])){
    $_SESSION['error'] = "Please login to hava access to dashboard !!!";
    header('location: ../login.php');
    exit(0);
} else {
         if($_SESSION['auth_role'] != '1' && $_SESSION['auth_role'] != '2'){
            $_SESSION['error'] = "You are not authorise as an ADMIN_USER /// (Only admin can login)!!!";
            header('location: ../login.php');
            exit(0);
         } 
}