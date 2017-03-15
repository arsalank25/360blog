
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if ( !isset($lol["username"]) ) {
  echo "You have encountered an error please go back and try again <br>";
  echo "<a href='lab8-3.html'>retun to user Entry</a>";}
  else{
$sql = " SELECT * FROM users where username = '" . $lol["username"]  .  "' ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)==0) {
  echo "User name incorrect or user does not exist  <br>";
  echo "<a href='lab8-4.html'>Return to find</a>";
} else {
  while($row = mysqli_fetch_assoc($results))
{
// the keys match the field names from the table
echo "User ".   $row["username"] ."<br>First Name ".   $row["firstName"] ."<br>Last Name ".   $row["lastName"] ."<br>Email: ".   $row["email"] ;

}

      }}



//and fetch requsults


mysqli_close($connection);

?>
