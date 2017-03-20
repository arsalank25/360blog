<nav>
  <ul>
    <li><a href="home.php">Home</a></li>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ( isset($_SESSION["sUserName"])) {
      # code...
      echo "<li><a href='profile.php'>Profile</a></li>";
    } ?>
    <?php

    if ( isset($_SESSION["sUserName"])) {
      # code...
      echo "<li><a href='php/logOut.php'>Log out</a></li>";
    } else {
      echo "
     <li><a href='login.php'>Log In</a></li>
     <li><a href='register.php'>Register</a></li>";
      # code...
    }
     ?>
     <li><a href="#">About Us</a></li>
  </ul>
</nav>
