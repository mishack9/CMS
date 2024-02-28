<?php
 include('./authentication.php');
 include('./includes/header.php'); 
 include('./function.php');
  ?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
<?php  
get_message();
include('./message.php');
 ?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <?php
$sql = mysqli_query($conn, "SELECT * FROM posts");
$count = mysqli_num_rows($sql);
                                ?>
                                <div class="card bg-success shadow-lg text-white mb-4">
                                    <div class="card-body">Total_Post</div>
                                    <div class="text-center"><?php echo $count; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_post.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-book-open"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
$sql = mysqli_query($conn, "SELECT * FROM catergory");
$count = mysqli_num_rows($sql);
                                ?>
                                <div class="card bg-primary shadow-lg text-white mb-4">
                                    <div class="card-body">Total_Catergoris</div>
                                    <div class="text-center"><?php echo $count; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_catergory.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-list"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
$sql = mysqli_query($conn, "SELECT * FROM user_ WHERE role_as = '1'");
$count = mysqli_num_rows($sql);
                                ?>
                                <div class="card bg-dark shadow-lg text-white mb-4">
                                    <div class="card-body">Total_Admin</div>
                                    <div class="text-center"><?php echo $count; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_admin.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-key"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <?php
$sql = mysqli_query($conn, "SELECT * FROM user_ WHERE role_as = '0'");
$count = mysqli_num_rows($sql);
                                ?>
                                <div class="card bg-info shadow-lg text-white mb-4">
                                    <div class="card-body">Total_User's</div>
                                    <div class="text-center"><?php echo $count; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage_normal_user.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-users"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
<?php include('./includes/footer.php') ?>
<?php include('./includes/scripts.php') ?>