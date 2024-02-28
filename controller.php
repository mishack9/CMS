<?php
include('./config.php');
include('./function.php');


if(isset($_POST['register'])){
    $firstname = htmlentities(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = htmlentities(mysqli_real_escape_string($conn, $_POST['lastname']));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm_password = htmlentities(mysqli_real_escape_string($conn, $_POST['confirm_password']));
    $rander = rand(1,2);
if($firstname == "" || $lastname == "" || $email == "" || $password == "" || $confirm_password == ""){
    $_SESSION['error'] = "All fields are required !!!";
    header("location: register.php");
    exit();
}
if(empty($_POST['firstname'])){
    $_SESSION['error'] = "firstname fields is required !!!";
    header("location: register.php");
    exit(); 
}
if(empty($_POST['lastname'])){
    $_SESSION['error'] = "lastname fields is required !!!";
    header("location: register.php");
    exit(); 
}
if(empty($_POST['email'])){
    $_SESSION['error'] = "email fields is required !!!";
    header("location: register.php");
    exit(); 
}
if(empty($_POST['password'])){
    $_SESSION['error'] = "password fields is required !!!";
    header("location: register.php");
    exit(); 
}
    $lowercase = preg_match('@[a-z]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    if(strlen($password < 8) || !$lowercase || !$uppercase || !$number){
        $_SESSION['error'] = "Password length should 8-12 digit ... An uppercase, lowercase mix with number for strong password strength !!!";
    header("location: register.php");
    exit(); 
    } elseif($password == $confirm_password){
        $sql_checkemail = mysqli_query($conn, "SELECT email FROM user_ WHERE email = '$email'");
        if(mysqli_num_rows($sql_checkemail) > 0){
              $_SESSION['error'] = "The email you enter is already present in the database !!! Pls use another emial_id...";
              header('location: register.php');
              exit(0);
        } else {
            if($rander == 1){
                $profile_pix = "./rander/profile/image.jpg";
            }elseif($rander == 2){
                $profile_pix = "./rander/profile/image1.jpg";
            }
                  $password_hash = password_hash($password, PASSWORD_BCRYPT);
                 $sql_insert_data = "INSERT INTO user_(firstname, lastname, email, password, rander) 
                 VALUES (?,?,?,?,?)";
                 $stmt = mysqli_stmt_init($conn);
                 $prepare = mysqli_stmt_prepare($stmt, $sql_insert_data);
                 if($prepare){
                    mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $email, $password_hash, $profile_pix);
                    mysqli_stmt_execute($stmt);
                    set_message("Registration successfully...");
                    header('location: ./login.php');
                    exit(0);
                 }
                 else 
                 {
                    echo "ERROR...".mysqli_error($conn);
                 }
        }
    }
    else
    {
        $_SESSION['error'] = "Your password and confirm_password are not matched !!!";
        header('location: register.php');
        exit(0);
    }

}






if(isset($_POST['login'])){
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));

    $sql_select = mysqli_query($conn, "SELECT * FROM user_ WHERE email = '$email' LIMIT 1");
    if(mysqli_num_rows($sql_select) > 0){
        foreach($sql_select as $data){
            $user_id = $data['id'];
            $user_name = $data['firstname'].' '.$data['lastname'];
            $user_email = $data['email'];
            $pass = $data['password'];
            $role_as = $data['role_as'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = "$user_id";
        $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_email'=>$user_email,
        ];

            if(password_verify($password, $data['password'])){
                    if($_SESSION['auth_role'] == "1"){
                          set_message("Welcome to dashboard..");
                          header('location: ./admin/index.php');
                          exit(0);
                    }
                    if($_SESSION['auth_role'] == "2"){
                        set_message("You are here ⬇⬇⬇..");
                        header('location: ./admin/index.php');
                        exit(0);
                  }
                    elseif($_SESSION['auth_role'] == "0"){
                        set_message("You are logged in..");
                        header('location: ./index.php');
                        exit(0);
                      } else {
                        set_message("You are logged in..");
                        header('location: ./index.php');
                        exit(0);
                      }
                     
            }
            else
            {
                $_SESSION['error'] = "Invalid password!!!";
                header('location: login.php');
                exit(0);
            }
    }
    else
    {
        $_SESSION['error'] = "Invalid email or credentials !!!";
        header('location: login.php');
        exit(0); 
    }

}





