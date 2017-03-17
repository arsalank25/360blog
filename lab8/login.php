
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["username"]) && !isset($lol["password"]) ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";}
else{

$sql = " SELECT * FROM users where username = '" . $lol["username"]  . "' AND password = '" . md5($lol["password"])  . "'  ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)==0) {
  echo "User name or password in correct <br>";
  echo "<a href='lab8-2.html'>retun to user Entry</a>";
} else {


    echo "user	has a	valid credentials";
  }
}



//and fetch requsults


mysqli_close($connection);

?>
