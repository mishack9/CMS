<?php
include('./authentication.php');
include('./super/superadmin.php');
include('./includes/header.php');
include('./function.php');
?>

<?php 
if(isset($_REQUEST['action'])){
    ?>
<div class="container-fluid px-4">
                <div class="container mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_User/Admin / Add</em></h2>
                                    <div class="card-tools">
                                        <a href="manage_user.php" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-backward mr-3"></i></a>
                                    </div>
                                    <?php include('./message.php'); ?>
                                </div>
                                <div class="card-body">
                                 <h4><em>Add_user's</em></h4>
                                 <form action="code.php" method = "POST">
                                    <div class="row">
                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">First_Name</label>
                                                <input  type="text" name = "firstname" class = "form-control rounded-pill" placeholder = "enter firstname">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Last_Name</label>
                                                <input  type="text" name = "lastname" class = "form-control rounded-pill" placeholder = "enter lastname">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Email</label>
                                                <input  type="text" name = "email" class = "form-control rounded-pill" placeholder = "enter email address">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Password</label>
                                                <input  type="text" name = "password" class = "form-control rounded-pill" placeholder = "enter password">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Confirm_Password</label>
                                                <input  type="text" name = "confirm_password" class = "form-control rounded-pill" placeholder = "re-enter password">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Status</label>
                                                <input type="checkbox" name = "status" class = "rounded-pill">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Role_as</label>
                                               <select name="role_as" id="role_as">
                                                <option value="">--Select_role--</option>
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                               </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <input type="submit" name = "add_user" class = "float-end rounded-pill btn btn-primary mx-5 px-5" value = "Add">
                                            </div>
                                        </div>

                                    </div>
                                 </form>
                                </div>
                            </div>
                        </div>
</div>
    <?php
}
else
{
    ?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">User's/Admin management/Add</li>
                        </ol>
<?php
 get_message(); 
 ?>
        
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_Admin/User's table</em></h2>
                                    <div class="card-tools">
                                        <a href="?action=add" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-add mr-3"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h5 class = "text-center"><em>Admin/User's</em></h5>
                                        <table id = "myDataTable" class = "table table-all table-strike">
                                            <thead>
                                                <tr>
                                                    <th>USER_ID</th>
                                                    <th>FIRST_NAME</th>
                                                    <th>LAST_NAME</th>
                                                    <th>USER_EMAIL</th>
                                                    <th>USER_PROFILE</th>
                                                    <th>USER_ROLE</th>
                                                    <th>EDITH</th>
                                                    <th>DELETE</th>
                                                    
                                                </tr>
                                            </thead>
                                            <?php
                                            $number = "";
                                          $query = mysqli_query($conn, "SELECT * FROM user_");
                                          if(mysqli_num_rows($query) > 0){
                                          foreach($query as $data){
                                          $number ++;
                                                ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $number; ?></td>
                                                    <td><?php echo $data['firstname'] ?></td>
                                                    <td><?php echo $data['lastname'] ?></td>
                                                    <td><?php echo $data['email'] ?></td>
                                                    <td><?php echo $data['rander'] ?></td>
                                                    <td><?php  if($data['role_as'] == '1'){ echo "Admin"; }else{echo "User";} ?></td>
                                                    <td><a href="edith_user.php?id=<?php echo $data['id'] ?>" class = "btn btn-outline-warning mx-4 px-4"><i class = "fas fa-pen mr-3"></i></a></td>
                                                    <td>
                                                        <form action="code.php" method = "POST">
                                                            <button type = "submit" name = "delete_user" value = "<?php echo $data['id'] ?>" class = "btn btn-outline-danger mx-4 px-4" onclick = "return confirm('Are you sure you want to delete this data ??')"><i class = "fas fa-trash mr-3"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                <?php
                    }
                         }
               else
                        {
                 ?>
                                         <tr>
        <td colspan = "6"><h3 class = "text-center text-danger">No recorsd available !!!</h3></td>
    </tr>
    <?php
 }
                                            ?>
                                         
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
    <?php
}
?>

<?php include('./includes/scripts.php') ?>
<?php include('./includes/footer.php') ?>