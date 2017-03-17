<?php


 if (!isset($_SESSION["userName"] )) {?>

   <p>This page is only available to users</p>
   <a href="login.php">login</a>
 <?php }
 else {  ?>


   <!DOCTYPE html>
   <html>
   <head>
   </head>
   <body>


<a href="#">Secure Data Page</a>
<a href="logout.php">LogOut</a>
   </body>
    </html>

<?php } ?>
