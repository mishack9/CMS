<?php
include('./config.php'); 
$page_title = "HOME_PAGE BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
include('./includes/header.php');
include('./includes/navbar.php');
include('./function.php');
?>


<?php 
include('./message.php');
get_message();
 ?>

 
<div class="section">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div>
                        <h4><em>My_BLOG:</em></h4>
                        <hr style="size:20px">
                    </div>
                    <p class = "text-secondary" style = "color:indigo;">  margin: 0;
  font-family: var(--mdb-body-font-family);
  font-size: var(--mdb-body-font-size);
  font-weight: var(--mdb-body-font-weight);
  line-height: var(--mdb-body-line-height);
  color: var(--mdb-body-color);
  text-align: var(--mdb-body-text-align);
  background-color: var(--mdb-body-bg);
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  {
}
body {}

  margin: 0;
  font-family: var(--mdb-body-font-family);
  font-size: var(--mdb-body-font-size);
  font-weight: var(--mdb-body-font-weight);
  line-height: var(--mdb-body-line-height);
  color: var(--mdb-body-color);
  text-align: var(--mdb-body-text-align);
  background-color: var(--mdb-body-bg);
  -webkit-text-size-adj</p>
                </div>

                <div class="col-md-4 mt-5">
                    <div class="card card-body" style = "width:330px; box-shadow:7px 2px 4px">
                    <div class="image">
                        <img src="navbar/download (3).jpg" alt="about_image" style = "width:300px; height:100px; border:2px solid skyblue; border-radius:10px">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div class = "py-3" style = "background:lightgray">
<div class="containe-fluid" style ="padding:10px">
    
<h4 class = "text-warning text-center"><em><strong class = "mt-3">POSTS:</strong></em></h4>
<hr style = "font-size:bold; color:red">

    <div class="row">
<?php 
 $sql_posts = "SELECT * FROM posts WHERE status = '0' LIMIT 9";
 $result_run = mysqli_query($conn, $sql_posts);
 
 
  while ($row = mysqli_fetch_array($result_run)) {
?>
        <div class="col-md-4">
            <div class="card card-body bg-dark mt-2 mb-2" style = "height:180px !important; border-radius: 10px; border:2px solid grey; color:pink">
                <div class="card-tools text-center">
                    <p class = "text-light"><b><?php echo $row['name'] ?></b></p>
                     <div class="card-title text-light">
                        <?php echo substr($row['description'], 0,200) ?> ....
                     </div>
                    <div>
                        <label for="">
                            Posted_on: <?php echo date("D:M:Y", strtotime($row['created_at'])) ?>
                        </label>
                    </div>
                    <a href="more.php?id=<?php echo $row['id'] ?>">Read_more...  <i class = "fas fa-arrow-right mr-3"></i></a>
                </div>
            </div>
        </div>
        <?php } ?> 
    </div>
     
</div>


<div class = "container mt-5">
<h4 class = "text-warning"><em><strong class = "mt-3">LATEST_POSTS:</strong></em></h4>
<hr style = "width:px; color:red">
   <div class="row">
    <?php 
           $sql = mysqli_query($conn, "SELECT * FROM catergory WHERE status = '0' ORDER BY id ");
           while($fetch = mysqli_fetch_array($sql)){
           $id = $fetch['id'];

           $sql_posts = mysqli_query($conn, "SELECT * FROM posts WHERE id = '$id' ORDER BY id DESC LIMIT 6");
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

        </div>
        </div>
    </div>


   </div>
</div>

</div>


<?php  include('./includes/footer.php'); ?> 