
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["username"]) &&   !isset($lol["firstname"])  && !isset($lol["lastname"]) && !isset($lol["email"]) && !isset($lol["password"]) ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";}
else{

$sql = " SELECT * FROM users where username = '" . $lol["username"]  . "' OR email = '" . $lol["email"]  . "'  ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)>0) {
  echo "User alrady exisists with the same username and/or email address <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";
} else {
  $sql = " INSERT INTO users(username, firstName, lastName, email,password) VALUES ('" . $lol["username"] . "','" . $lol["firstname"] . "','" . $lol["lastname"] . "','" . $lol["email"] . "','" . md5($lol["password"]) . "') ;";
  $results = mysqli_query($connection, $sql);

    echo "User account has been created";
  }
}


//and fetch requsults


mysqli_close($connection);

?>
