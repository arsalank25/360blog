
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["userName"]) &&   !isset($lol["firstName"])  && !isset($lol["lastName"]) && !isset($lol["email"]) && !isset($lol["pass"]) && !isset($lol["re-pass"])  ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";}
else{

$sql = " SELECT * FROM bloguser where userName = '" . $lol["userName"]  . "' OR email = '" . $lol["email"]  . "'  ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)>0) {
  echo "User alrady exisists with the same username and/or email address <br>";
  echo "<a href='../register.html'>retun to user Entry</a>";
} else {
  $sql = " INSERT INTO bloguser(userName, firstName, lastName, email,pass) VALUES ('" . $lol["userName"] . "','" . $lol["firstName"] . "','" . $lol["lastName"] . "','" . $lol["email"] . "','" . md5($lol["pass"]) . "') ;";
  $results = mysqli_query($connection, $sql);


  }
}


//and fetch requsults


mysqli_close($connection);
header('Location: '. '../login.php');
?>
