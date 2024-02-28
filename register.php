<?php
include('./config.php'); 
$page_title = "REGISTER_PAGE FOR BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AMD MYSQLI";
$page_keyword = "PHP,HTML,BOOTSTRAP";
include('./includes/header.php');
/*if(isset($_SESSION['auth'])){
  if(!isset($_SESSION['error'])){
    $_SESSION['error'] = "You are already logged in...";
    exit(0);
  }
}

*/

include('./function.php');

?>


<div class="container mt-5">
   <div class="row justify-content-center">
    <?php
include('./message.php');
get_message();
    ?>
    <div class="col-xl-7 lg-5">
        <h2 class = "text-center">REGISTER</h2>
        <div class="card card-body shadow-lg">
           <div class="d-flex m-auto text-center mb-3"><i class = "fas fa-user mr-2 fa-2x text-center"></i></div>
           <form method = "POST" action = "./controller.php" enctype = "multipart/form-data">
  <!-- Name input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="firstname" name = "firstname"  class="form-control" />
    <label class="form-label" for="firstname">FIRST_NAME</label>
  </div>

<div class="row">
  <div class="col">
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="lastname" name = "lastname" class="form-control" />
    <label class="form-label" for="lastname">LAST_NAME</label>
  </div>
  </div>

  <div class="col">
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" id="email" name = "email" class="form-control" />
    <label class="form-label" for="email">EMAIL</label>
  </div>
  </div>

  <div class="row">
    <div class="col">
    <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="password" name = "password" class="form-control" />
    <label class="form-label" for="password">PASSWORD</label>
  </div>
    </div>

    <div class="col">
    <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="confirm_password" name = "confirm_password" class="form-control" />
    <label class="form-label" for="confirm_password">CONFIRM_PASSWORD</label>
  </div>
    </div>


  </div>
  </div>
  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" name = "register" class="btn btn-primary  btn-block mb-4" value = "">SIGN_UP</button>
</form>
<p>
    Alredy have an account
<a href="./login.php"><small>Login</small></a>
</p>
        </div>
    </div>
   </div>
</div>

<br><br><br><br>

<?php
include('./includes/footer.php');
?>