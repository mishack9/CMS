
<?php
include('./authentication.php');
include('./includes/header.php');
include('./function.php');
?>

<div class="container-fluid px-4">
                <div class="container mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class = "text-center"><em>manage_posts / Update</em></h2>
                                    <div class="card-tools">
                                        <a href="manage_post.php" class = "btn btn-outline-dark mx-5 px-5 float-end"><i class = "fas fa-backward mr-3"></i></a>
                                    </div>
                                    <?php include('./message.php'); ?>
                                </div>
                                <div class="card-body">
                                 <h4><em>Edith_Posts</em></h4>
                                 <hr>
                                 <form action="code.php" method = "POST" enctype = "multipart/form-data">
                                    <div class="row">
                                        <?php
                                        if(isset($_GET['id'])){
                                            $post_id = $_GET['id'];
                                        
                      $sql = mysqli_query($conn, "SELECT * FROM posts WHERE id = '$post_id'");
                      if(mysqli_num_rows($sql) > 0){
                      $count = mysqli_fetch_array($sql);
                                        ?>
                                    <div class="col-xl-12 lg-12 mb-3">
                                        <input type="hidden" name = "id" value = "<?php echo $count['id'] ?> ">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Catergory_list</label>
                                                <br>
                                                <?php
                                                     $sql = "select * from catergory where status = '0'";
                                                     $sql_test = mysqli_query($conn, $sql);
                                                ?>
                                                <select name="catergory_id" id="catergory_id">
                                                    <option>--Select_catergory--</option>
                                                    <?php    while($row = mysqli_fetch_array($sql_test)){ ?>
                                                        <option value="<?php echo $row['id'] ?>"<?php echo $row['id'] == $count['catergory_id'] ? 'selected' : '' ?> ><?php echo $row['name'] ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Post_name</label>
                                                <input required type="text" name = "name" class = "form-control rounded-pill" value = "<?php echo $count['name'] ?>" placeholder = "Enter catergory name here">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Slug(SEO)</label>
                                                <input required type="text" name = "slug"  value = "<?php echo $count['slug'] ?>" class = "form-control rounded-pill" placeholder = "Generate Slug">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 lg-12 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Post_description</label>
                                                <textarea name="description"  id="summernote" cols="30" rows="10" class = "form-control"><?php echo htmlentities($count['description']) ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Photo(Image)</label>
                                                <input type="hidden" name = "old_image" value = "<?php echo $count['photo'] ?>">
                                                <input type="file" name = "image" class = "form-control rounded-pill">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 lg-12 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_tilte</label>
                                                <input required type="text" name = "meta_title"  value = "<?php echo $count['meta_title'] ?>" class = "form-control rounded-pill" placeholder = "SEO title">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_description</label>
                                                <textarea name="meta_description" class = "form-control" id="" cols="30" rows="10"> <?php echo $count['meta_description'] ?> </textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Meta_keyword</label>
                                                <textarea name="meta_keyword" class = "form-control" id="" cols="30" rows="10"> <?php echo $count['meta_keyword'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <label for="" class = "fw-bold">Status</label>
                                               <input type="checkbox" name = "status" <?php echo $count['status'] == '1' ? 'checked' : '' ?>>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 lg-6 mb-3">
                                            <div class="form-group md-form">
                                                <input type="submit" name = "edith_post" class = "float-end rounded-pill btn btn-primary mx-5 px-5" value = "Update_post">
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                      }
                    }
                           ?>
                                 </form>
                                </div>
                            </div>
                        </div>
</div>

<?php include('./includes/scripts.php') ?>
<?php include('./includes/footer.php') ?>
