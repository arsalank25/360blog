
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["userName"]) && !isset($lol["pass"]) ) {
  echo "You have encountered an error please go back and try again <br>";
  header("Refresh:2; url=../login.php");}
else{

$sql = " SELECT * FROM bloguser where userName = '" . $lol["userName"]  . "' AND pass = '" . md5($lol["pass"])  . "'  ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)==0) {
  echo "User name or password incorrect. Try again. <br>";
  header("Refresh:2; url=../login.php");
}
 else {
  if ($result = mysqli_query($connection, $sql)) {
  $_SESSION["login"] = true;
  while($row = mysqli_fetch_assoc($result))
  {

    if ($row['userStatus']==0) {

        echo "Sorry, this user has been disabled by the admin <br>";
    }
  // the keys match the field names from the table
else {
    session_start();
    $_SESSION["sUserName"] = $row['userName'] ;
    $_SESSION["sUserStatus"] = $row['userStatus'] ;
    $_SESSION["sUserType"] = $row['userType'] ;
    // fetch a record from result set into an associative array
    echo "user	has a	valid credentials, you are now logged in";


}
  }}
    mysqli_close($connection);
    header("Refresh:2; url=../home.php");
  }
}
?>
