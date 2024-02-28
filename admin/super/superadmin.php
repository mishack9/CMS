<?php
  if($_SESSION['auth_role'] != '2'){
    $_SESSION['error'] = "You are not authorise as a super_ADMIN_USER /// (Only super_admin can access)!!!";
    header('location: ./index.php');
    exit(0);
 } 