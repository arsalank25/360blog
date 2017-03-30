
<?php include 'php/navbar.php';?>

<article>

<?php

include 'php/conn.php';
$postUserName = (string)$_GET['userName'];
if ( !isset($postUserName) ) {
  echo "You have encountered an error please go back and try again <br>";}
  else{
$sql = " SELECT * FROM bloguser where userName = '" . $postUserName  .  "' ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)==0) {
  echo "User name incorrect or user does not exist  <br>";
  echo "<a href='lab8-4.html'>Return to find</a>";
} else {
  while($row = mysqli_fetch_assoc($results))
{
// the keys match the field names from the table


$sql = "SELECT contentType, image FROM userImages where userName=?";
// build the prepared statement SELECTing on the userID for the user
$stmt = mysqli_stmt_init($connection);
//init prepared statement object
mysqli_stmt_prepare($stmt, $sql);
// bind the query to the statement
mysqli_stmt_bind_param($stmt, "s", $row["userName"]);
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
    echo "<div class='centerInput'>";
		echo '<br><img src="data:image/'.$type.';base64,'.base64_encode($image).'"/>';

    echo "<br>User ".   $row["userName"] ."<br>First Name ".   $row["FirstName"] ."<br>Last Name ".   $row["LastName"] ."<br>Email: ".   $row["email"] . "</div>" ;


    $dbUserName= $row["userName"];
}


      }}
      if (isset($_SESSION["sUserType"]) ) {
        if ($_SESSION["sUserType"]==1) {echo "<form action='editProfile.php' class='centerInput' method='post'>
          <input type='submit' value='Edit Profile'>
        </form>";}
      }
      if (isset($_SESSION["sUserName"]) ) {
        if (strcmp($_SESSION["sUserName"],$dbUserName) == 0  ) {
          echo "<form action='editProfile.php' class='centerInput' method='post'>
          <input type='submit' value='Edit Profile'></form>";}
      }

 ?>



<footer>Copyright &copy; </footer>

</div>

</body>
</html>
