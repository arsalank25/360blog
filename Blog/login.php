<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">

<script src="https://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>

<div class="container">

<header>
   <h1>Lets Travel</h1>
</header>

<?php include 'navbar.php';?>
<article>

<form method="post" action="php/login.php" id="aForm" >
    <fieldset>
  <div class="imgcontainer">
    <img src="image/userIcon.png" alt="Avatar" class="avatar">
  </div>

  <div class="container"><span>
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="userName" required></span>
    <span>
    <label><b>Password </b></label>
    <input type="password" placeholder="Enter Password" name="pass" required></span>
    <span>
    <button type="submit">Login</button></span>

  </div>

  <div class="container" >
    <button type="button" class="cancelbtn">Cancel</button>
    <span id='forgotPass'> <a href="#"> Forgot password?</a></span>
  </div>
</fieldset>
</form>


</article>

<footer>Copyright &copy; </footer>

</div>

</body>
<script>
w3IncludeHTML();
</script>
</html>