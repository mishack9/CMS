<?php
 include('./authentication.php');
 include('./includes/header.php'); 
 include('./function.php');
  ?>

<?php

   $user_profile = $_SESSION['auth_user'];
      
                ?>


<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-6 xl-6">
                                <div class="card bg-dark shadow-lg">
                                    <div class="card-header">
                                       <h4 class = "text-center text-light"> Profile's</h4>
                                       <div class="card-tools">
                                        <a href="edith_profile.php" class = "btn btn-outline-primary mr-2 mx-5 px-5"><i class = "fas fa-pen mr-2"></i></a>
                                       </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <img src="../rander/profile/image.jpg" class = "profile-image" alt="profile-image">
                                        </div>
                                        <div class="container bg-secondary text-light rounded-pill p-4 text-center">
                                            <ul>
                                                <li class = "mt-3 mb-3 text-center"><b>User_ansme:</b> <b><?= $_SESSION['auth_user']['user_name'] ?></b></li>
                                                <li class = "mt-3 mb-3 text-center"><b>Email:</b> <b><?= $_SESSION['auth_user']['user_email'] ?></b></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 xl-4">
                                <div class="card card-body">
                                        <div class = "container test-center">
                                    <form action="code.php" method = "GET">
                                      
                                    <button type = "submit" name = "delete_account" class = "btn btn-danger w-50 px-5 mx-5 mb-3" onclick = "return confirm('Are you sure you want to delete this account ???')">DELETE_ACCOUNT</button>
                                    
                                    <button type = "submit" name = "delete_account" class = "btn btn-primary w-50 px-5 mx-5 mb-3">DON'T DELETE</button>
                                </form>
                                 </div>
                                </div>
                            </div>
                        </div>

</div>


<?php include('./includes/footer.php') ?>
<?php include('./includes/scripts.php') ?>