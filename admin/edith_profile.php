<?php
 include('./authentication.php');
 include('./includes/header.php'); 
 include('./function.php');
  ?>


<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                        <h3 class = "text-center"><em>UPDATE_PROFILE</em></h3>

             <div class="card">
                <div class="card-header">
                    <em class = "text-center"><h3>Change profile</h3></em>
                </div>
             </div>
             <?php
$user_profile = $_SESSION['user_name'];
 
$sql_edith_account = mysqli_query($conn, "SELECT * FROM user_ WHERE email = '$user_profile'");
while($fetch_user = mysqli_fetch_array($sql_edith_account)){
?>
               <form action="code.php" method = "POST" enctype = "multipart/form-data">
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <div class="md-form">
                            <label for="" class = "fw-bold">Firstname</label>
                            <input type="text" name = "firstname" class = "form-control rounded-pill" value = "<?php echo $fetch_user['firstname'] ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="md-form mt-5">
                            <label for="" class = "fw-bold">Lastname</label>
                            <input type="text" name = "lastname" class = "form-control rounded-pill" value = "<?php echo $fetch_user['lastname'] ?>">
                        </div>
                    </div>

                    <div class="col-md-4 mt-5">
                        <div class="md-form">
                            <label for="" class = "fw-bold">Email</label>
                            <input type="text" name = "email" class = "form-control rounded-pill" value = "<?php echo $fetch_user['email'] ?>">
                        </div>
                    </div>

                    <div class="col-md-4 mt-5">
                        <div class="md-form">
                        <input type="submit" name = "update_user" class = "btn btn-primary rounded-pill mx-5 px-5" value = "Update">
                        </div>
                    </div>
                  
                </div>
               </form>
               <?php } ?>
</div>

<?php include('./includes/footer.php') ?>
<?php include('./includes/scripts.php') ?>