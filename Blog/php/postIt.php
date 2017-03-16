
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["title"]) &&   !isset($lol["post"])   ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";}
else{

  $sql = " INSERT INTO post(topic, theText) VALUES ('" . $lol["title"] . "','" . $lol["post"]  . "') ;";
  $results = mysqli_query($connection, $sql);

    echo "User post has been created";
}


mysqli_close($connection);

?>
