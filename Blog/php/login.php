
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["userName"]) && !isset($lol["pass"]) ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";}
else{

$sql = " SELECT * FROM bloguser where userName = '" . $lol["userName"]  . "' AND pass = '" . md5($lol["pass"])  . "'  ;";
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
