

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>


<script src="https://www.w3schools.com/lib/w3data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<div class="container">

<header>
   <h1>Lets Travel</h1>
</header>

<div w3-include-html="navbar.html"></div>


<?php

include 'php/conn.php';
$postID = (integer)$_GET['id'];
$sql = "SELECT * FROM post WHERE ID=?";
$stmt = mysqli_prepare($connection, $sql);
/* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "i", $postID);

    /* execute query */
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$id, $topic, $theText, $postStamp, $userName);

    /* fetch value */
    mysqli_stmt_fetch($stmt);

echo '<div class="centerInput"> <h2>'  . $topic . '</h2></div> ';

echo '<div class="centerInput"> '  . $theText . '</div> <br> <br>';

echo '<div class="centerInput"> <b>'  . $userName . '</b></div> ';
mysqli_stmt_close($stmt);


$sql = "SELECT * FROM postcomment WHERE postID=?";
$stmt = mysqli_prepare($connection, $sql);
/* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "i", $postID );

    /* execute query */
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$ID,$postID,$userName,$comment, $postStamp);

    /* fetch value */
    while (mysqli_stmt_fetch($stmt)) {
  echo $comment . '-' . $userName . '-' . $postStamp . '-' .  '<br/>';
  }

mysqli_stmt_close($stmt);
mysqli_close($connection);
    /* close statement */
 ?>




<form action="php/commentIt.php">
<div class="centerInput">  <textarea maxlength="499" rows="4" cols="100" name="comment"  placeholder="Enter Comment here">
  </textarea></div>


    <input type='hidden' name="postID" value=" <?php echo $postID;  ?> " />

        <input type='hidden' name="userName" value="arsalan" />

<div class="centerInput">
      <button type="submit">Post</button></div>
</form>

<footer>Copyright &copy; </footer>

</div>
<script type="text/javascript">
w3IncludeHTML();
</script>
</body>
</html>
