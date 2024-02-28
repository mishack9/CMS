<?php
include('./authentication.php');
include('./includes/header.php'); 
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">User's management/Edith</li>
                        </ol>

                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_user / Edith</em></h2>
                                    <div class="card-tools">
                                        <a href="manage_user.php" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-backward mr-3"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                 <h4 class = "text-center text-success"><em>Edith_user's</em></h4>
                                 <form action="code.php" method = "POST">
                                    <div class="row">
                                        <?php
                                        if(isset($_GET['id'])){
                                            $edith_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user_ WHERE id = '$edith_id'");
$data = mysqli_fetch_array($query);
    ?>
    <input type="hidden" name = "id" value = "<?php echo $data['id'] ?>">
    
                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">First_Name</label>
                                                <input type="text" value = "<?php echo $data['firstname'] ?>" name = "firstname" class = "form-control rounded-pill" placeholder = "enter firstname">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Last_Name</label>
                                                <input type="text"   value = "<?php echo $data['lastname'] ?>" name = "lastname" class = "form-control rounded-pill" placeholder = "enter lastname">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Email</label>
                                                <input type="email"  value = "<?php echo $data['email'] ?>" name = "email" class = "form-control rounded-pill" placeholder = "enter email address">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Status</label>
                                                <input type="checkbox" <?php echo $data['status'] == '1' ? 'checked':'' ?> name = "status" class = "rounded-pill">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Role_as</label>
                                               <select name="role_as" id="role_as">
                                                <option>--Select--</option>
                                                <option value="1" <?php echo $data['role_as'] == '1' ? 'selected' : '' ?> >Admin</option>
                                                <option value="0"  <?php echo $data['role_as'] == '0' ? 'selected' : '' ?> >User</option>
                                               </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <input type="submit" name = "edith_user" class = "float-end rounded-pill btn btn-primary mx-5 px-5" value = "Update">
                                            </div>
                                        </div>
                                   <?php
                                        }
                                        ?>
                                    </div>
                                 </form>
                                </div>
                            </div>
                        </div>
</div>


<?php include('./includes/footer.php') ?>
<?php include('./includes/scripts.php') ?>