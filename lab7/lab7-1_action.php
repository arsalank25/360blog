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
$filename="data.txt";
$myfile = fopen("data.txt", "r") or die("Unable to open file!");

if ($myfile) {
   $array = explode("\n", fread($myfile, filesize($filename)));
}
fclose($myfile);
$users = array(array());
for($x = 0; $x < sizeof($array) ; $x++) {
$new  = array ($array = explode(",",$array[$x]));
array_push($users, $new);
 };


 for($x = 0; $x < sizeof($users) ; $x++) {

   for($y = 0; $y < sizeof($users[$x]) ; $y++) {

print_r($users[$x][$y]);
    };

  };


 ?>
