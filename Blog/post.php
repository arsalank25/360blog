

<?php include 'php/navbar.php';?>
<?php

include 'php/conn.php';
$postIDint = (integer)$_GET['id'];

$sql = "SELECT email, topic, bloguser.userName, userType,theText  FROM post INNER JOIN bloguser ON post.userName = bloguser.userName WHERE ID = ?";
$stmt = mysqli_prepare($connection, $sql);

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "i", $postIDint);

    /* execute query */
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$email, $topic, $userName, $userType,$theText);

    /* fetch value */
    mysqli_stmt_fetch($stmt);
    echo "<article>";

    echo '<div class="centerInput"> <h2>'  . $topic . '</h2></div> ';

    echo '<div class="centerInput"> '  . $theText . '</div> <br> <br>';

    if ($userType==1) {
        echo  "<div class='centerInput'>  <b><span style='color:red;'><a href='profile.php?userName=" . $userName .  "'>" . $userName .  "</a> - Admin</span></b></div>";
    }
    else {
      echo "<div class='centerInput'>  <b><a href='profile.php?userName=" . $userName .  "'>" . $userName .  "</a></b></div>";
     }
    mysqli_stmt_close($stmt);


$sql = "SELECT ID, postcomment.userName,postID, postStamp, userType ,comment FROM postcomment INNER JOIN bloguser ON postcomment.userName = bloguser.userName WHERE postID =?";
$stmt = mysqli_prepare($connection, $sql);
/* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "i", $postIDint );

    /* execute query */
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$ID,$userName,$postID,$postStamp,$userType,$comment );

echo '<hr><div class="centerInput"><h3> Comments  </h3></div><br/><hr>';
    /* fetch value */
    while (mysqli_stmt_fetch($stmt)) {
  echo '<div class="centerInput">' .  $comment . ' - ' ;

  if ($userType==1) {
      echo  "<div class='centerInput'>  <b><span style='color:red;'><a href='profile.php?userName=" . $userName .  "'>" . $userName .  "</a> - Admin</span></b></div>";
  }
  else {
    echo "<div class='centerInput'>  <b><a href='profile.php?userName=" . $userName .  "'>" . $userName .  "</a></b></div>";
   }
  echo  $postStamp . '<br>' .  '</div>';

  if (isset($_SESSION["sUserType"]) ) {
    if ($_SESSION["sUserType"]==1) {echo "<form class='centerInput' action='php/deleteComment.php'><input type='hidden' name='var' value=" . $ID . "> <button type='submit'>Delete comment</button></form>";}
  }

  echo "<hr>";
  }

mysqli_stmt_close($stmt);
mysqli_close($connection);
    /* close statement */
 ?>




<form action="php/commentIt.php" method="post">
<div class="centerInput">  <textarea maxlength="499" rows="4" cols="100" name="comment"  placeholder="Enter Comment here">
</textarea></div>
<input type='hidden' name="postID" value=" <?php echo $postIDint;  ?> " />
<input type='hidden' name="userName" value="arsalan" />
<div class="centerInput"><button type="submit">Post</button></div>
</form>
</article>

<footer>Copyright &copy; </footer>

</div>
<script type="text/javascript">
w3IncludeHTML();
</script>
</body>
</html>
