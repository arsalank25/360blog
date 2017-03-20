
<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["title"]) &&   !isset($lol["post"])   ) {
  echo "You have encountered an error or a feild was left bank";

  mysqli_close($connection);

  header('Location: '. '../home.php');}
else{

  $sql = " INSERT INTO post(topic, theText, userName) VALUES ('" . $lol["title"] . "','" . $lol["post"]  . "','" .   $_SESSION["sUserName"] . "') ;";
  $results = mysqli_query($connection, $sql);

}


mysqli_close($connection);

header('Location: '. '../home.php');
?>
