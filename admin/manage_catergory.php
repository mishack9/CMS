
<?php
include('./authentication.php');
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
                                    <h2 class = "text-center"><em>manage_catergory / Add</em></h2>
                                    <div class="card-tools">
                                        <a href="manage_catergory.php" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-backward mr-3"></i></a>
                                    </div>
                                    <?php include('./message.php'); ?>
                                </div>
                                <div class="card-body">
                                 <h4><em>Add_Catergory</em></h4>
                                 <form action="code.php" method = "POST">
                                    <div class="row">
                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Catergory_name</label>
                                                <input required type="text" name = "name" class = "form-control rounded-pill" placeholder = "Enter catergory name here">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Slug(SEO)</label>
                                                <input required type="text" name = "slug" class = "form-control rounded-pill" placeholder = "Generate Slug">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 lg-12 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Catergory_description</label>
                                                <textarea name="description"  id="summernote" cols="30" rows="10" class = "form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 lg-12 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_tilte</label>
                                                <input required type="text" name = "meta_title" class = "form-control rounded-pill" placeholder = "SEO title">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_description</label>
                                                <textarea name="meta_description" class = "form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_keyword</label>
                                                <textarea name="meta_keyword" class = "form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Navbar_status</label>
                                               <input type="checkbox" name = "navbar_status" >
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Status</label>
                                               <input type="checkbox" name = "status" >
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <input type="submit" name = "add_cat" class = "float-end rounded-pill btn btn-primary mx-5 px-5" value = "Add">
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
                            <li class="breadcrumb-item active">User's management/Catergory</li>
                        </ol>
<?php
 get_message(); 
 ?>
        
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_catergory</em></h2>
                                    <div class="card-tools">
                                        <a href="?action=add" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-add mr-3"></i></a>
                                    </div>
                                    <div class="card_tools">
                                    <form action="code.php" method = "POST">
                                                            
                                    <button type = "submit" name = "restore_cat" value = "<?php echo $data['id'] ?>" class = "btn btn-outline-success mx-5 px-5" onclick = "return confirm('? Restore ?')"><i class = "fas fa-refresh mr-3"></i></button>
                                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h5 class = "text-center"><em>Catergory</em></h5>
                                        <table id = "myDataTable" class = "table table-all table-strike">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>CAT_NAME</th>
                                                    <th>CAT_SLUG</th>
                                                    <th>CAT_TITLE</th>
                                                    <th>CAT_STATUS</th>
                                                    <?php if($_SESSION['auth_role'] == '2') : ?>
                                                    <th>EDITH</th>
                                                    <?php endif; ?>
                                                    <th>DELETE</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $number = "";
 $query = mysqli_query($conn, "SELECT * FROM catergory WHERE  status != '2'");
 if(mysqli_num_rows($query) > 0){
    foreach($query as $data){
        $number ++;
    ?>
   <tbody>
                                                <tr>
                                                    <td><?php echo $number; ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td><?php echo $data['slug'] ?></td>
                                                    <td><?php echo $data['meta_title'] ?></td>
                                                    <td><?php echo $data['status'] == '1' ? 'hidden' : 'visible' ?></td>
                                        <?php if($_SESSION['auth_role'] == '2') : ?>
                                                    <td><a href="edith_cat.php?id=<?php echo $data['id'] ?>" class = "btn btn-outline-warning mx-4 px-4"><i class = "fas fa-pen mr-3"></i></a></td>
                                                   <?php endif; ?>
                                                    <td>
                                                        <form action="super_admin_code.php" method = "POST">
                                                            <button type = "submit" name = "delete_cat" value = "<?php echo $data['id'] ?>" class = "btn btn-outline-danger mx-4 px-4" onclick = "return confirm('Are you sure you want to delete this data ??')"><i class = "fas fa-trash mr-3"></i></button>
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
