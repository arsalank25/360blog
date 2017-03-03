<?php
$firstname ;
$key;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$lol = $_POST;}
else {
  $lol = $_GET;
}

if ( isset($lol["firstname"]) && isset($lol["key"]) ){
$firstname = $lol["firstname"];
$key= $lol["key"];

echo 'First Name: '. $lol["firstname"];
echo '<br>Key: '. $lol["key"];

}

$myfile = fopen("data.txt", "r") or die("Unable to open file!");
$lines = file($myfile, FILE_IGNORE_NEW_LINES);
fclose($myfile);

 ?>
