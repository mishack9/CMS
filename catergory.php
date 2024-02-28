<?php
include('./config.php'); 
if(!isset($_SESSION['auth'])){
    $_SESSION['error'] = "Please login  !!!";
    header('location: ./login.php');
    exit(0);
}
if(isset($_GET['title'])){
$slug = htmlentities(mysqli_real_escape_string($conn, $_GET['title']));
$sql = mysqli_query($conn, "SELECT slug, meta_title, meta_description, meta_keyword FROM catergory WHERE slug = '$slug'");
if(mysqli_num_rows($sql) > 0){
$fetch_url = mysqli_fetch_array($sql);
$page_title = $fetch_url['meta_title'];
$page_description = $fetch_url['meta_description'];
$page_keyword = $fetch_url['meta_keyword'];
} else 
{
$page_title = "HOME_PAGE BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
}
} else {
$page_title = "HOME_PAGE/CATERGORY BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
}

include('./includes/header.php');
include('./includes/navbar.php');
include('./function.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
<?php
if(isset($_GET['title'])){
    $slug = htmlentities(mysqli_real_escape_string($conn, $_GET['title']));
    $sql_select = mysqli_query($conn, "SELECT id, slug FROM catergory WHERE slug = '$slug'");
    $row = mysqli_num_rows($sql_select);
    if($row > 0){
        $fecth = mysqli_fetch_array($sql_select);
        $catergory_id = $fecth['id'];

           $sql_posts = mysqli_query($conn, "SELECT id, name, slug, created_at FROM posts WHERE catergory_id = '$catergory_id'");
           if(mysqli_num_rows($sql_posts) > 0){
            foreach($sql_posts as $row){
?>
                <a href="post.php?posts=<?php echo $row['slug'] ?>">
                    <div class="card card-body mb-3 shadow-lg">
                        <h4><em><?php echo $row['name'] ?></em></h4>
                        <div><p class = "text-dark"><?php echo date("d:m:y", strtotime($row['created_at'])) ?></p></div>
                    </div>
                </a>
<?php
            }
           } else {
            ?>
            <div class = "alert alert-danger text-center"><h4><em>!!! No Posts Record Found !!!</em></h4></div>
            <?php
           }
 } else {
    ?>
    <div class = "alert alert-danger text-center"><h4><em>!!! No Catergory Record Found !!!</em></h4></div>
    <?php
 }
}
else
{
    ?>
    <div class = "alert alert-danger text-center"><h4><em>!!! No URL Found !!!</em></h4></div>
    <?php 
}
 
 ?>
                </div>
                <div class="col-md-6">
                    <p></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
        <?php for($e = 0; $e < 2; $e++){ ?>
           <div class="card mb-3 shadow-lg">
            <div class="card-header">
                <h5><em>Advert_Area</em></h5>
            </div>
            <div class="card-body">
                advert here
            </div>
           </div>
           <?php } ?>
        </div>
        </div>
    </div>
</div>

 


<?php  include('./includes/footer.php'); ?> 