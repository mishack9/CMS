<?php
include('./authentication.php');
include('./super/superadmin.php');
include('./includes/header.php');
include('./function.php');
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin management/Add</li>
                        </ol>
<?php
 get_message(); 
 ?>
        
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_Admin table</em></h2>
                                    <div class="card-tools">
                                        <a href="?action=add" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-add mr-3"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h5 class = "text-center"><em>Admin's</em></h5>
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
 $query = mysqli_query($conn, "SELECT * FROM user_ WHERE role_as = '1'");
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
                                                    <td><img src="../rander/profile/<?php  echo $data['rander'] ?>" alt=""></td>
                                                    <td><?php echo $data['role_as'] == '1' ? 'admin':'user' ?></td>
                                                    <td><a href="edith_admin.php?id=<?php echo $data['id'] ?>" class = "btn btn-outline-warning mx-4 px-4"><i class = "fas fa-pen mr-3"></i></a></td>
                                                    <td>
                                                        <form action="code.php" method = "POST">
                                                            <button type = "submit" name = "delete_admin" value = "<?php echo $data['id'] ?>" class = "btn btn-outline-danger mx-4 px-4" onclick = "return confirm('Are you sure you want to delete this data ??')"><i class = "fas fa-trash mr-3"></i></button>
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

<?php include('./includes/scripts.php') ?>
<?php include('./includes/footer.php') ?>
