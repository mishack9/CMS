<?php
include('./config.php'); 
$page_title = "ABOUT BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
include('./includes/header.php');
include('./function.php');
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondary sticky-top">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="./navbar/download (3).jpg"
          height="60px"
          width="200px"
          style = "border-radius:15px; box-shadow:4px 1px 1px; border:1px solid grey"
          alt="user"
          loading="lazy"
          class = "user-image"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active btn btn-info rounded-pill  shadow-lg text-primary mx-2 px-4" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-info rounded-pill px-4 text-primary mx-2" style = "border: 1px solid skyblue" href="">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-info rounded-pill px-4 text-primary mx-2" style = "border: 1px solid skyblue" href="">Catergories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-info rounded-pill px-4 text-primary mx-2" style = "border: 1px solid skyblue" href="#">Features</a>
        </li>
        <!-- Button trigger modal -->
        <li class="nav-item">
          <a class="nav-link btn btn-success rounded-pill px-4 text-primary mx-2" style = "border: 1px solid skyblue" href="about.php">About_us</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements
    <div class="d-flex align-items-center p-2">
      
      <a class="text-reset me-4" href="#">
        <i class="fas fa-message"></i>
        <span class="badge rounded-pill badge-notification bg-danger">3</span>
      </a>
-->
      <!-- Notifications 
      <div class="dropdown">
        <a
          class="text-reset me-5 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fas fa-bell mr-2"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink px-3"
        >
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
    -->
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
         <i class = "fa fa-user  mr-2"></i>
        </a>
        
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
        <?php if(isset($_SESSION["auth_user"])){ ?>
            <p class = "text-center text-primary"></p>
          <li>
            <a class="dropdown-item" href="#"><?= $_SESSION['auth_user']['user_name'] ?></a>
          </li>
          <li>
            <a class="dropdown-item" href="">Profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="">Settings</a>
          </li>
          <li>
            <form action="logout.php" method = "POST">
                <button type = "submit" name = "logout" class = "btn btn-outline-dark rounded-pill px-3 mx-3">Logout</button>
            </form>
          </li>
           <?php }else{ ?>
            <li>
          <li>
            <a class="dropdown-item" href="login.php">Login</a>
          </li>

          <li>
            <a class="dropdown-item" href="register.php">Register</a>
          </li>

          <?php } ?>
        
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<?php 
include('./message.php');
get_message();
 ?>

 
<div class="section">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div>
                        <h4><em>My_BLOG:</em></h4>
                        <hr style="size:20px">
                    </div>
                    <p class = "text-secondary">  margin: 0;
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

                <div class="col-md-3 mt-5">
                    <div class="image">
                        <img src="navbar/download (3).jpg" alt="about_image" style = "width:300px; height:100px; border:2px solid skyblue; border-radius:10px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div class="row justify-content-center">
    <div class="col-xl-6 lg-6 mb-5">
        <div class="container">
            <div class="card" style = "box-shadow:7px 2px 4px">
               <div class="card-header text-center">
                <h2 style = "color:blue;">About</h2>
               </div> 
               <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xl-6 lg-6">
                        <div class="container-fluid">
                            <p><em>I am mishack Hananiahs from Nigeria . <br> 
                              I study in G S S New karshi Nasarawa state where i obtain my SSCE result with glad credit.
                              <br>
                              I am currently working as a developer. I learn HTML,PHP and MYSQL which i used in creating interactive web pages like the current one you are going through.. 
                              I love to create and contribute ... and my aim is to explore world wide..       <br>
                              <div class="text-center">
                                  THANK'S
                              </div>
                            </em></p>
                        </div>
                    </div>
                    <div class="col-xl-6 lg-6">
                        <div class="container text-center">
                            <img src="image/mishack.jpg" alt="About" style = "height:200px; width:200px; border-radius:20px 5px 7px; box-shadow:2px 3px 4px 4px; border:2px solid white;">
                        </div>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>


<?php  include('./includes/footer.php'); ?> 