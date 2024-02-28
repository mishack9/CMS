<?php
include('./config.php'); 
if(!isset($_SESSION['auth'])){
    $_SESSION['error'] = "Please login  !!!";
    header('location: ./login.php');
    exit(0);
}
if(isset($_GET['post'])){
$slug = htmlentities(mysqli_real_escape_string($conn, $_GET['post']));
$sql = mysqli_query($conn, "SELECT slug, meta_title, meta_description, meta_keyword FROM posts WHERE slug = '$slug'");
if(mysqli_num_rows($sql) > 0){
$fetch_url = mysqli_fetch_array($sql);
$page_title = $fetch_url['meta_title'];
$page_description = $fetch_url['meta_description'];
$page_keyword = $fetch_url['meta_keyword'];
} else 
{
$page_title = "HOME_PAGE/POSTS BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
}
} else {
$page_title = "HOME_PAGE/POSTS BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
}

include('./includes/header.php');
include('./includes/navbar.php');
include('./function.php');

/*if(isset($_GET['type'], $_GET['id'])){
    $type = $_GET['type'];
    $id = $_GET['id'];

    switch ($type) {
        case 'posts':
            $insert = mysqli_query($conn, "INSERT INTO likes(post_id, user_id) SELECT {$_SESSION['user_id']}, {$id}
                         FROM posts WHERE EXISTS(SELECT id FROM posts WHERE id = {$id})
                         AND NOT EXISTS(SELECT id FROM likes WHERE user_id = {$_SESSION['user_id']} AND post_id {$id})
                         LIMIT 1
                    ");
            break;
        
    }
}
*/
?>


<div class="py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-10">
<?php

      if(isset($_GET['posts'])){
$slug = htmlentities(mysqli_real_escape_string($conn, $_GET['posts']));
 $sql_select_posts = mysqli_query($conn, "SELECT * FROM posts WHERE slug = '$slug' LIMIT 1");
 if(mysqli_num_rows($sql_select_posts) > 0){
while($row = mysqli_fetch_array($sql_select_posts)){
        
?>
                
                    <div class="card mb-3" style = "border:2px solid green; border-radius:20px; box-shadow:3px 1px 5px 2px; background-color:light">
                        <div class="card-header">
                        <h4 class = "text-center"><em><?php echo $row['name'] ?></em></h4>
                        </div>
                        <div class = "card-body"> 
                            <label class = "text-primary">Posted_on: <?php echo date("d:m:y", strtotime($row['created_at'])) ?></label>
                       <hr>
                        <div class="text-center">
                            <?php if($row['photo']) : ?>
                            <img src="./admin/posts/uploads/<?php echo $row['photo'] ?>" class = "w-80 h-50" alt="<?php echo $row['name'] ?>" style = "height:150px; width:200px; border-radius:20px;">
                       <?php endif; ?>
                            <p><em><?php echo $row['description'] ?></em></p>
                        </div>
                        </div>
                    </div>
<?php
}
 } else {
    ?>
    <div class="alert alert-danger text-center"><h4><em>!!! No Posts_Data Found !!!</em></h4></div>
        <?php 
 }
 } else {
    ?>
<div class="alert alert-danger text-center"><h4><em>!!! No URL Found !!!</em></h4></div>
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

       <section class = "py-3">
        <div class="container-fluid">
            <h2 class = "text-center"></h2>
        </div>
        
<div class = "container mt-5">
<h4 class = "text-warning"><em><strong class = "mt-3">OTHER_RELATED_POSTS:</strong></em></h4>
<hr style = "width:50px; color:red">
   <div class="row">
    <?php 
           $sql = mysqli_query($conn, "SELECT * FROM catergory WHERE status = '0' LIMIT 6");
           while($fetch = mysqli_fetch_array($sql)){
           $id = $fetch['id'];

           $sql_posts = mysqli_query($conn, "SELECT * FROM posts WHERE id = '$id' LIMIT 6");    
          
           foreach($sql_posts as $data){
            
    ?>
    <div class="col-md-8">
        <a href="post.php?posts=<?php echo $data['slug'] ?>">
            <div class="card card-body mt-2 mb-2 shadow-lg">
                <?php echo $data['name'] ?> 
             <label class ="text-secondary">Posted_on: <?php echo date("d:m:Y", strtotime($data['created_at'])) ?></label>
            </div>
        </a>
        
    </div>
<?php } } ?>



    <div class="col-md-4">
        <div class="card shadow-lg">
        <div class="card-header">
            <h3>Advert_Area</h3>
        </div>
        <div class="card-body">
Advert goes here
        </div>
        </div>
    </div>
   </div>
</div>

       </section>
</div>

 


<?php  include('./includes/footer.php'); ?> 