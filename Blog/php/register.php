
<?php
include 'conn.php';
ini_set('display_errors', '0');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}
if (  !isset($lol["userName"])  &&   !isset($lol["firstName"])  && !isset($lol["lastName"]) && !isset($lol["email"]) && !isset($lol["pass"]) && !isset($lol["re-pass"])  ) {
  echo "You have encountered an error please go back and try again <br>";

  mysqli_close($connection);
  header("Refresh:2; url=../register.php");
}
else{

$sql = " SELECT * FROM bloguser where userName = '" . $lol["userName"]  . "' OR email = '" . $lol["email"]  . "'  ;";
$results = mysqli_query($connection, $sql);

if ( mysqli_num_rows($results)>0) {
  echo "User alrady exisists with the same username and/or email address Pease retry <br>";
  mysqli_close($connection);
  header("Refresh:2; url=../register.php");
} else{



    //uploading file

    $target_dir = "../uploads/";
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
            mysqli_close($connection);
            header("Refresh:2; url=../register.php");
            $uploadOk = 0;
        }
    }

    //check file size
    if ($_FILES["fileToUpload"]["size"] > 100000) {
        echo "Sorry, your file is too large.";
        mysqli_close($connection);
        header("Refresh:2; url=../register.php");
        $uploadOk = 0;
    }

    //check file type
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        mysqli_close($connection);
        header("Refresh:2; url=../register.php");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. Please Retry";

        mysqli_close($connection);
        header("Refresh:2; url=../register.php");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br> <h1>You have been registerd.<h1>";
        } else {
            echo "Sorry, there was an error uploading your file.";
            mysqli_close($connection);
            header("Refresh:2; url=../register.php");
        }}

$sql = " INSERT INTO bloguser(userName, firstName, lastName, email,pass) VALUES ('" . $lol["userName"] . "','" . $lol["firstName"] . "','" . $lol["lastName"] . "','" . $lol["email"] . "','" . md5($lol["pass"]) . "') ;";
$results = mysqli_query($connection, $sql);


$imagedata = file_get_contents($target_file);
//$imagedata = file_get_contents($_FILES['fileToUpload']['tmp_name']);
//store the contents of the files in memory in preparation for upload
$sql = "INSERT INTO userimages (userName, contentType, image) VALUES(?,?,?)";
 // create a new statement to insert the image into the table. Recall
// that the ? is a placeholder to variable data.
$stmt = mysqli_stmt_init($connection); //init prepared statement object

mysqli_stmt_prepare($stmt, $sql); // register the query

$null = NULL;
mysqli_stmt_bind_param($stmt, "ssb", $lol["userName"], $imageFileType, $null);
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


mysqli_close($connection);
header("Refresh:2; url=../login.php");

  }
}


//and fetch requsults


?>
