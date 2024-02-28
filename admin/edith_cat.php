
<?php
include('./authentication.php');
include('./includes/header.php');
include('./function.php');
?>

<div class="container-fluid px-4">
                <div class="container mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_catergory / Edith</em></h2>
                                    <div class="card-tools">
                                        <a href="manage_catergory.php" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-backward mr-3"></i></a>
                                    </div>
                                    <?php include('./message.php'); ?>
                                </div>
                                <div class="card-body">
                                 <h4><em>Edith_Catergory</em></h4>
                                 <?php
        if(isset($_GET['id'])){
            $cat_id = $_GET['id'];
            $catergory = mysqli_query($conn, "SELECT * FROM catergory WHERE id = '$cat_id'");
            $fetch = mysqli_fetch_assoc($catergory);
            ?>
 <form action="code.php" method = "POST">
                                    <div class="row">
                                        <input type="hidden" name = "id" value = "<?php echo $fetch['id'] ?>">
                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Catergory_name</label>
                                                <input required type="text"  value = "<?php echo $fetch['name'] ?>" name = "name" class = "form-control rounded-pill" placeholder = "Enter catergory name here">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Slug(SEO)</label>
                                                <input required type="text"  value = "<?php echo $fetch['slug'] ?>" name = "slug" class = "form-control rounded-pill" placeholder = "Generate Slug">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 lg-12 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Catergory_description</label>
                                                <textarea name="description" id="summernote" cols="20" rows="10" class = "form-control"><?php echo htmlentities($fetch['description']) ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 lg-12 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_tilte</label>
                                                <input required type="text"  value = "<?php echo $fetch['meta_title'] ?>" name = "meta_title" class = "form-control rounded-pill" placeholder = "SEO title">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_description</label>
                                                <textarea name="meta_description" class = "form-control" id="" cols="20" rows="10"><?php echo $fetch['meta_description'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_keyword</label>
                                                <textarea name="meta_keyword" class = "form-control" id="" cols="20" rows="10"><?php echo $fetch['meta_keyword'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Navbar_status</label>
                                               <input type="checkbox" name = "navbar_status"  <?php echo $fetch['navbar_status'] == '1' ? 'checked' : '' ?> >
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Status</label>
                                               <input type="checkbox" name = "status"  <?php echo $fetch['status'] == '1' ? 'checked' : '' ?> >
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <input type="submit" name = "update_cat" class = "float-end rounded-pill btn btn-primary mx-5 px-5" value = "Update_Catergory">
                                            </div>
                                        </div>

                                    </div>
                                 </form>
            <?php
        }
                                 ?>
                                
                                </div>
                            </div>
                        </div>
</div>


<?php include('./includes/footer.php') ?>
<?php include('./includes/scripts.php') ?>