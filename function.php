<?php

function set_message($message){
{
    $_SESSION['message'] = $message;
}
}

function get_message(){
    if(isset($_SESSION['message'])){
        ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Yello... !!! </strong>  <?php  echo $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        <?php
              unset($_SESSION['message']);
    }
}


