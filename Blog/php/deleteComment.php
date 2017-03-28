
<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}

    $message = $lol["var"];
echo "<script type='text/javascript'>alert('$message');</script>";
if ( !isset($lol["var"]) &&   !isset($_SESSION["sUserType"])   ) {

  echo "You have encountered an error or a feild was left bank";

  mysqli_close($connection);

  header('Location: '. '../home.php');}
else{
  if ($_SESSION["sUserType"]==1) {
    $sql = " DELETE FROM postcomment WHERE ID = " . $lol["var"] . ";";
    $results = mysqli_query($connection, $sql);

  }



}


mysqli_close($connection);

header('Location: '. '../home.php');
?>
