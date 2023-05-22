<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&display=swap');

  .font-fam1 {
    font-family: 'Poppins', sans-serif;
  }

  .font-fam2 {
    font-family: 'Roboto', sans-serif;
  }
</style>

<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}

echo '<nav class="navbar has-background-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item is-size-3 font-fam2 has-text-link-light" href="../phpLoginSystem/main.php">Natures Explorer</a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start mx-auto ">
        <a class="navbar-item is-size-5 font-fam1 has-text-link-light">
          Home
        </a>;
  
       <a class="navbar-item is-size-5 font-fam1 has-text-link-light">
         Services
        </a>

        <a class="navbar-item is-size-5 font-fam1 has-text-link-light">
         About
        </a>
  
        
      </div>
  
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">';

if (!$loggedin) {
  echo '
      <a class="button is-primary" href="../phpLoginSystem/signup.php">
        <strong>Sign up</strong>
      </a>
      <a class="button is-light" href="../phpLoginSystem/login.php">
        Login
      </a>';
}

if ($loggedin) {
  echo '
    <a class="button is-light" href="../phpLoginSystem/logout.php">
        Logout
      </a>
      ';
}

echo '
          </div>
        </div>
      </div>
    </div>
  </nav>';

?>