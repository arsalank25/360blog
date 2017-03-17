
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["postID"]) &&   !isset($lol["userName"])  && !isset($lol["comment"])   ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-1.html'>retun to user Entry</a>";}
else{

  $postID= $lol["postID"];
  $userName=$lol["userName"];
  $comment=$lol["comment"];


  $sql = " INSERT INTO postcomment(postID, userName, comment) VALUES (?, ?, ?)";
// prepare and bind
$stmt = $connection->prepare($sql);
$stmt->bind_param("iss", $postID, $userName, $comment);
// set parameters and execute
$stmt->execute();}
mysqli_close($connection);
?>
