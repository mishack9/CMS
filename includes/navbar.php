
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
          <a class="nav-link btn btn-info rounded-pill px-4 text-primary mx-2" style = "border: 1px solid skyblue" href="post.php">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-info rounded-pill px-4 text-primary mx-2" style = "border: 1px solid skyblue" href="catergory.php">Catergories</a>
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


<div class="py-5-fluid bg-dark">
    <div class="container-fluid">
        <div class="row">
<?php
    $catergory_slug = mysqli_query($conn, "SELECT * FROM catergory WHERE navbar_status = '0' AND status = '0' LIMIT 6");
    foreach($catergory_slug as $fetch){
?>
<div class="col-md-2 mb-4">
   <a href="catergory.php?title=<?php echo $fetch['slug'] ?>" class="text-decoration-none">
       <div class="card card-body bg-light text-center mt-3 rounded-pill" style = "">
       <?php echo $fetch['name'] ?>
       </div>
</a>
</div>
<?php
    }
?>
<!--
<div class="row justify-content-center align-items-center">
<div class="col-md-6 mt-2 mb-2">
      <form class="d-flex" action = "search.php" method = "GET">
        <input class="form-control" type="search"  name = "search_data" placeholder="Search Posts Data">
       <input type="submit" name = "search" value = "Search" class="btn btn-outline-primary">
      </form>
</div>
</div>
  -->
        </div>
    </div>
</div>
