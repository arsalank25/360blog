<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo "You have been logged out!";

header("Refresh:2; url=../login.php");
?>

</body>
