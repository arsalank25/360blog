
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["username"]) &&   !isset($lol["oldpassword"])  &&  !isset($lol["newpassword"] && $lol["newpassword"] != $lol["newpassword-check"]  )  ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-3.html'>retun to user Entry</a>";} else{

$sql = " SELECT * FROM users where username = '" . $lol["username"]  . "' AND password = '" . md5($lol["oldpassword"])  . "'  ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)==0) {
  echo "User name or password in correct <br>";
  echo "<a href='lab8-3.html'>Return to change password Page</a>";
} else {
  $sql = " UPDATE users SET  password = '" . md5($lol["oldpassword"]) . "' WHERE usename = '" . $lol["username"]  . "'  ;";
  $results = mysqli_query($connection, $sql);

    echo "User account has been updated";
  }
}



//and fetch requsults


mysqli_close($connection);

?>
