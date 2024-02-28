
<?php

    if(isset($_SESSION['error'])){
        ?>
        <div class="container">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !!! </strong> <?php  echo $_SESSION['error']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
        <?php
              unset($_SESSION['error']);
    }
