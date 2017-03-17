
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

echo "User ".   $row["username"] ."<br>First Name ".   $row["firstName"] ."<br>Last Name ".   $row["lastName"] ."<br>Email: ".   $row["email"]  . "<br>User ID: " . $row["userID"];

$sql = "SELECT contentType, image FROM userImages where userID=?";
// build the prepared statement SELECTing on the userID for the user
$stmt = mysqli_stmt_init($connection);
//init prepared statement object
mysqli_stmt_prepare($stmt, $sql);
// bind the query to the statement
mysqli_stmt_bind_param($stmt, "i", $row["userID"]);
// bind in the variable data (ie userID)
$result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
// Run the query. run spot run!
mysqli_stmt_bind_result($stmt, $type, $image); //bind in results
 // Binds the columns in the resultset to variables
mysqli_stmt_fetch($stmt);
// Fetches the blob and places it in the variable $image for use as well
// as the image type (which is stored in $type)
mysqli_stmt_close($stmt);
// release the statement

		echo '<br><img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';

}



      }}



//and fetch requsults


mysqli_close($connection);

?>
