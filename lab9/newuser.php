
<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  echo "can only use post for fileupload";
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

  //uploading file

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }

  //check file size
  if ($_FILES["fileToUpload"]["size"] > 100000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  //check file type
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }}

    echo "User account has been created";

    $sql = " INSERT INTO users(username, firstName, lastName, email,password) VALUES ('" . $lol["username"] . "','" . $lol["firstname"] . "','" . $lol["lastname"] . "','" . $lol["email"] . "','" . md5($lol["password"]) . "') ;";
    $results = mysqli_query($connection, $sql);

    $sql = " SELECT userID FROM users WHERE username = '" . $lol["username"] . "' ;";
    $results = mysqli_query($connection, $sql);
    //$userID = $results['userID'];
    while($row = mysqli_fetch_assoc($results))
  {
  // the keys match the field names from the table

  $userID = $row['userID'];//echo "User ".   $row["username"] ."<br>First Name ".   $row["firstName"] ."<br>Last Name ".   $row["lastName"] ."<br>Email: ".   $row["email"] ;

  }


$imagedata = file_get_contents($target_file);
//$imagedata = file_get_contents($_FILES['fileToUpload']['tmp_name']);
//store the contents of the files in memory in preparation for upload
$sql = "INSERT INTO userImages (userID, contentType, image) VALUES(?,?,?)";
 // create a new statement to insert the image into the table. Recall
// that the ? is a placeholder to variable data.
$stmt = mysqli_stmt_init($connection); //init prepared statement object

mysqli_stmt_prepare($stmt, $sql); // register the query

$null = NULL;
mysqli_stmt_bind_param($stmt, "isb", $userID, $imageFileType, $null);
// bind the variable data into the prepared statement. You could replace
// $null with $data here and it also works. You can review the details
// of this function on php.net. The second argument defines the type of
// data being bound followed by the variable list. In the case of the
// blob, you cannot bind it directly so NULL is used as a placeholder.
// Notice that the parametner $imageFileType (which you created previously)
// is also stored in the table. This is important as the file type is
// needed when the file is retrieved from the database.

mysqli_stmt_send_long_data($stmt, 2, $imagedata);
// This sends the binary data to the third variable location in the
// prepared statement (starting from 0).
$result = mysqli_stmt_execute($stmt) or die(mysqli_stmt_error($stmt));
// run the statement

mysqli_stmt_close($stmt); // and dispose of the statement.

  }
}


//and fetch requsults


mysqli_close($connection);

?>
