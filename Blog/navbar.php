
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">

<script src="https://www.w3schools.com/lib/w3data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<body>
<div class="container">

<header>
   <h1>Lets Travel</h1>
</header>

</header>
<nav>
  <ul>
    <li><a href="home.php">Home</a></li>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ( isset($_SESSION["sUserName"])) {
      # code...
      echo "<li><a href='profile.php?userName=" . $_SESSION["sUserName"] . "'>Profile</a></li>";
    } ?>
    <li><a href='blogusers.php'>Blog Users</a></li>
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
