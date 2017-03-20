<?php
include 'php/conn.php';

  session_start();
$sql = "SELECT  * from post";
// run the query ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">

<script src="https://www.w3schools.com/lib/w3data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<body>
<div class="container">

<header>
   <h1>Lets Travel</h1>
</header>

</header>
<?php include 'navbar.php';?>
<article>

  <table id="myTable" class="display">
      <thead>
          <tr>
              <th>Date</th>

          </tr>
      </thead>
      <tbody>

            <?php
            if ($result = mysqli_query($connection, $sql)) {
            // fetch a record from result set into an associative array
            while($row = mysqli_fetch_assoc($result))
            {
            // the keys match the field names from the table

            echo "<td><a href='/Blog/post.php?id=" . $row['ID'] . "'><h3>" . $row['topic'] . "</h3></a>";
            echo $row['theText'] . "<h4> By: " . $row['userName'] . "<br>" . $row['postStamp'] . "</h4></td>" ;
            echo "</tr>";


            }
            }

            // echo '<script type="text/javascript">alert("' . $_SESSION["sUserName"]  . '");</script>';
             ?>




      </tbody>
  </table>
  <form action="php/postIt.php">

  <div class="centerInput"><label><b>Title:</b></label>
  <input type="text" placeholder="title" name="title" required></div>

  <div class="centerInput">
     <textarea maxlength="2999" rows="4" cols="100" name="post"  placeholder="Enter post here" > </textarea>
  </div>

  <div class="centerInput">
        <button type="submit">Post</button></div>
</form>
</article>




<footer>Copyright &copy; </footer>



</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#myTable').DataTable();
});

w3IncludeHTML();
</script>
</body>
</html>
<?php mysqli_close($connection); ?>
