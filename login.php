<?php
include('./config.php'); 
$page_title = "LOGIN BLOGGING WEBSITE";
$page_description = "BLOGGING WEB_PAGE PHP AND MYSQLI";
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
    <div class="row justify-content-center align-items-center">
    <?php
include('./message.php');
get_message();
    ?>
    <h3 class = "text-center">LOGIN</h3>
        <div class="col-md-6 mt-5">
        <i class = "fas fa-user mr-2 text-center"></i>
        <form method = "POST" action = "./controller.php">
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" id="email" name = "email" class="form-control" />
    <label class="form-label" for="email">Email address</label>
  </div>
  <!-- Password input -->
  <i class = "fas fa-key mr-2 text-center"></i>
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" id="password" name = "password" class="form-control" />
    <label class="form-label" for="password">Password</label>
  </div>
  
  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">


    <div class="col">
      <!-- Simple link -->
      <a href="forgot_pass.php">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" name = "login" class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="./register.php">Register</a></p>
    <p>or sign up with:</p>
    <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button  data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
        </div>
    </div>
</div>
<br><br><br>

<?php include('./includes/footer.php');  ?>
