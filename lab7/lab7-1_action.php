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
$lines = file($filename);
$users = array();
foreach($lines as $line_num => $line)
{
$temp = explode(",", $line);
array_push($users, $temp);
};

$output ="<h2>You fucked up</h2>";

foreach ($users as $user) {

if (strcmp($user[0],$key) == 0 && strcmp(strtolower($user[1]),strtolower($firstname)) ==0) {
 $output = '<h2>' . $user[1] . '\'s coffee choice </h2><br> <img src=' . $user[3] . '.jpg"> <br>' . $user[2]   ;
}
}

echo $output;

 ?>
