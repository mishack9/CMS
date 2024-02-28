<?php
include('./configuration/connection.php');
include('./authentication.php');
include('./super/superadmin.php');
include('./function.php');


if(isset($_POST['delete_cat'])){
    $delete_cat = $_POST['delete_cat'];
    $sql_delecat = mysqli_query($conn, "UPDATE catergory SET status = '2' WHERE id = '$delete_cat' LIMIT 1");
    if($sql_delecat)
    {
        set_message("Record deleted successfully...");
        header('location: manage_catergory.php');
        exit(0);
     }
     else 
     {
        $_SESSION['error'] = "Fail while deleting data.... Pls try again.";
        header('location: ./manage_catergory.php');
        exit(0);
     }
    }





    if(isset($_GET['post_delete'])){
        $post_delete_id = $_GET['post_delete'];
        $sql_fetch_image = mysqli_query($conn, "SELECT * FROM posts WHERE id = '$post_delete_id' LIMIT 1");
        $row = mysqli_fetch_array($sql_fetch_image);
        $image_img = $row['photo'];
       
        $sql_delete_post = mysqli_query($conn, "DELETE FROM posts WHERE id = '$post_delete_id' LIMIT 1");
        if($sql_delete_post){
           if(file_exists("./posts/uploads/".$image_img)){
               unlink("./posts/uploads/".$image_img);
           }
               set_message("Posts deleted successfully ....");
               header('location: manage_post.php');
               exit(0);
        }
              else 
              {
               $_SESSION['error'] = "Fail to delete posts....";
               header('location: manage_post.php');
               exit(0);
              }
       
       }
        

     