<?php
session_start();
if (!isset($_SESSION["userName"] )) {
  ?>

<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="scripts/validate.js"></script>

</script>
</head>

<body>

<form method="post" action="processlogin.php" id="mainForm" >
  Username:<br>
  <input type="text" name="username" id="username" class="required">
  <br>
  Password:<br>
  <input type="password" name="password" id="password" class="required">
  <br>
  <br><br>
  <input type="submit" value="Login">
</form>
</body>

<?php }
else {
  header('Refresh :0;URL = home.php');
}

?>
