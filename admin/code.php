<?php
include('./configuration/connection.php');
include('./authentication.php');
include('./function.php');
if(isset($_POST['edith_post'])){
    $post_id = $_POST['id'];
$catergory_id = mysqli_real_escape_string($conn, $_POST['catergory_id']);
$post_name = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
$post_slug = htmlentities(mysqli_real_escape_string($conn, $_POST['slug']));
$validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
$slug = preg_replace('/-+/', '-', $validate_slug);
$post_slug = $slug;
$post_description = htmlentities(mysqli_real_escape_string($conn, $_POST['description']));
$old_filename = $_POST['old_image'];
$image = $_FILES['image']['name'];
$update_file = "";
if($image != NULL){
$image_extension = pathinfo($image, PATHINFO_EXTENSION);
$filename = time().'.'.$image_extension;
$update_file = $filename;
}
else
{
    $update_file = $old_filename;
}
$post_meta_title = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_title']));
$post_meta_description = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_description']));
$post_meta_keyword = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_keyword']));
$status = $_POST['status'] == true ? '1' : '0';

$update_post = mysqli_query($conn, "UPDATE posts SET name = '$post_name', slug = '$post_slug', description =  '$post_description', photo = '$update_file', meta_title = '$post_meta_title', meta_description = '$post_meta_description', meta_keyword = '$post_meta_keyword', status = '$status' WHERE id = '$post_id'");
if($update_post){
    if($image != NULL){
        if(file_exists('./posts/uploads/'.$old_filename)){
            unlink("./posts/uploads/".$old_filename);
        }
        move_uploaded_file($_FILES['image']['tmp_name'], './posts/uploads/'.$update_file);
    }
    set_message("Posts data updated successfully...");
    header('location: manage_post.php');
    exit(0);
} else {
    $_SESSION['error'] = "Fail to update post data..";
    header('location: ./manage_post.php?action=add');
    exit(0);
}
}







if(isset($_POST['add_post'])){
    $catergory_id = mysqli_real_escape_string($conn, $_POST['catergory_id']);
    $post_name = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    $post_slug = htmlentities(mysqli_real_escape_string($conn, $_POST['slug']));
    $validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $validate_slug);
    $post_slug = $slug;
    $post_description = htmlentities(mysqli_real_escape_string($conn, $_POST['description']));
    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;
    $post_meta_title = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_title']));
    $post_meta_description = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_description']));
    $post_meta_keyword = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_keyword']));
    $status = $_POST['status'] == true ? '1' : '0';

    $sql_insert_post = "INSERT INTO posts(catergory_id, name, slug, description, photo, meta_title, meta_description, meta_keyword, status)
    VALUES('$catergory_id', '$post_name', '$post_slug', '$post_description', '$filename', '$post_meta_title', '$post_meta_description', '$post_meta_keyword', '$status')";
    $query_run_execute = mysqli_query($conn, $sql_insert_post);
    if($query_run_execute){
        move_uploaded_file($_FILES['image']['tmp_name'], './posts/uploads/'.$filename);
        set_message("New rocord successfully added...");
        header('location: manage_post.php');
        exit(0);
    }
    else
    {
        $_SESSION['error'] = "Fail to add record...";
        header('location: ./manage_post.php?action=add');
        exit(0);
    }
}







if(isset($_POST['update_cat']))
{
    $cat_id = $_POST['id'];
    $catname = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    $catslug = htmlentities(mysqli_real_escape_string($conn, $_POST['slug']));
    $validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $validate_slug);
    $catslug = $slug;
    $catdescription = htmlentities(mysqli_real_escape_string($conn, $_POST['description']));
    $catmetatile = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_title']));
    $catmetadescripton = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_description']));
    $catmetakeyword = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_keyword']));
    $navabar_status = $_POST['navbar_status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $sql_update = mysqli_query($conn, "UPDATE catergory SET name = '$catname', slug = '$catslug', description = '$catdescription', meta_title = '$catmetatile',
    meta_description = '$catmetadescripton', meta_keyword = '$catmetakeyword', navbar_status = '$navabar_status', status = '$status' WHERE id = '$cat_id'");
    if($sql_update){
        set_message("Data updated successfully...");
        header('location: manage_catergory.php');
        exit(0);
    }
       else {
       echo "Error !!!".mysqli_error($conn);
       }
}






    if(isset($_POST['restore_cat'])){
        $restore_cat = $_POST['restore_cat'];
        $sql_restore = mysqli_query($conn, "UPDATE catergory SET status = '0' WHERE status = '2' LIMIT 1");
        if($sql_restore)
        {
            set_message("Record restored successfully...");
            header('location: manage_catergory.php');
            exit(0);
         }
       
    }






if(isset($_POST['add_cat'])){
    $catname = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    $catslug = htmlentities(mysqli_real_escape_string($conn, $_POST['slug']));
    $validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
    $slug = preg_replace('/-+/', '-', $validate_slug);
    $catslug = $slug;
    $catdescription = htmlentities(mysqli_real_escape_string($conn, $_POST['description']));
    $catmetatile = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_title']));
    $catmetadescripton = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_description']));
    $catmetakeyword = htmlentities(mysqli_real_escape_string($conn, $_POST['meta_keyword']));
    $navabar_status = $_POST['navbar_status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

         $query_insert_cat = "INSERT INTO catergory (name, slug, description, meta_title, meta_description, meta_keyword, navbar_status, status)
         VALUES(?,?,?,?,?,?,?,?)";
         $stmt = mysqli_stmt_init($conn);
         $prepare = mysqli_stmt_prepare($stmt, $query_insert_cat);
         if($prepare){
            mysqli_stmt_bind_param($stmt, 'ssssssss', $catname, $catslug, $catdescription, $catmetatile, $catmetadescripton, $catmetakeyword, $navabar_status, $status);
            mysqli_stmt_execute($stmt);
            set_message("New data added successfully...");
            header('location: manage_catergory.php');
            exit(0);
         }
         else 
         {
            $_SESSION['error'] = "Fail while inserting this query.... Pls try again.";
            header('location: ./manage_catergory.php?action=add');
            exit(0);
         }
}








if(isset($_POST['delete_user'])){
    $delete = $_POST['delete_user'];
    $delete_query = mysqli_query($conn, "DELETE FROM user_ WHERE id = '$delete'");
    if($delete_query){
        set_message('Successfully deleted..');
        header('location: manage_user.php');
        exit(0);
    } else {
        $_SESSION['error'] = "Fail while phasing this query....";
        header('location: manage_user.php');
        exit(0);
    }
}





if(isset($_POST['add_user'])){
    $firstname = htmlentities(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = htmlentities(mysqli_real_escape_string($conn, $_POST['lastname']));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm_password = htmlentities(mysqli_real_escape_string($conn, $_POST['confirm_password']));
    $rander = rand(1,2);
    if($rander == 1){
        $profile = "./rander/profile/image.jpg";
    } elseif($rander == 2){
        $profile = "./rander/profile/image1.jpg";
    }
    $status = $_POST['status'] == true ? '1':'0';
    $role_as = $_POST['role_as'];   
if($password != $confirm_password){
    $_SESSION['error'] = "Password and confirm_password not matched...";
    header('location: ./manage_user.php?action=add');
    exit(0);
}

if($firstname == "" || $lastname == "" || $email == "" || $password == "" || $confirm_password = ""){
    $_SESSION['error'] = "All fields are required !!!";
    header("location: ./manage_user.php?action=add.php");
    exit();
}
if(empty($_POST['firstname'])){
    $_SESSION['error'] = "firstname fields is required !!!";
    header("location: ./manage_user.php?action=add.php");
    exit(); 
}
if(empty($_POST['lastname'])){
    $_SESSION['error'] = "lastname fields is required !!!";
    header("location: ./manage_user.php?action=add.php");
    exit(); 
}
if(empty($_POST['email'])){
    $_SESSION['error'] = "email fields is required !!!";
    header("location: ./manage_user.php?action=add.php");
    exit(); 
}
if(empty($_POST['password'])){
    $_SESSION['error'] = "firstname fields is required !!!";
    header("location: ./manage_user.php?action=add.php");
    exit(); 
}
    $lowercase = preg_match('@[a-z]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    if(strlen($password < 8) || !$lowercase || !$uppercase || !$number){
        $_SESSION['error'] = "Password lenhgt should 8-12 digit ... An uppercase, lowercase mix with number for strong password strength !!!";
    header("location: ./manage_user.php?action=add.php");
    exit(); 
    }

  $select = mysqli_query($conn, "SELECT email FROM user_ WHERE email = '$email'");
  if(mysqli_num_rows($select) > 0){
    $_SESSION['error'] = "The email you enter already exits in the database... select another email_id.....";
    header('location: ./manage_user.php?action=add');
    exit(0);
  }else{
        $hash = password_hash($password, PASSWORD_BCRYPT);
$query = mysqli_query($conn, "INSERT INTO user_ (firstname, lastname, email, password, rander, status, role_as) VALUES('$firstname', '$lastname', '$email', '$hash', '$profile', '$status', '$role_as')");
if($query){
    set_message('Admin.User data added successfully...');
    header('location: manage_user.php');
    exit(0);
} else {
   echo "error".mysqli_error($conn);
}
}
}






if(isset($_POST['edith_user'])){
    $edith_id = $_POST['id'];
    $firstname = htmlentities(mysqli_real_escape_string($conn, $_POST['firstname']));
    $lastname = htmlentities(mysqli_real_escape_string($conn, $_POST['lastname']));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $status = $_POST['status'] == true ? '1':'0';
    $role_as = $_POST['role_as'];

    $query_edith = mysqli_query($conn, "UPDATE user_ SET firstname = '$firstname', lastname = '$lastname', email = '$email', status = '$status', role_as = '$role_as' WHERE id = '$edith_id'");
    if($query_edith){
        set_message("Data update successfully !!!");
        header('location: manage_user.php');
        exit(0);
    }
    else 
    {
        $_SESSION['error'] = "Fail to update user's data...";
        header('./edith_user.php');
        exit(0);
    }

}