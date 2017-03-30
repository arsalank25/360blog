
<?php include 'php/navbar.php';?>
<article>

  <form action="blogUsers.php" class="centerInput" method="post">

    <input type="text" name="keyWord" placeholder="Search by topic/name/email">
    <input type="submit" value="Submit">
  </form>

            <?php
            include 'php/conn.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lol = $_POST;}
            else {
              $lol = $_GET;
            }
            if ( !isset($lol["keyWord"]) ) {


            $sql = "SELECT email, topic, bloguser.userName, userType FROM post INNER JOIN bloguser ON post.userName = bloguser.userName GROUP BY bloguser.userName ";
            // run the query
            if ($result = mysqli_query($connection, $sql)) {
            // fetch a record from result set into an associative array
            while($row = mysqli_fetch_assoc($result))
            { // the keys match the field names from the table


            if ($row['userType']==1) {

                echo  "<span style='color:red;'><a href='profile.php?userName=" . $row['userName'] .  "'>" . $row['userName'] .  "</a> - Admin</span>";
            }
            else {
              echo "<a href='profile.php?userName=" . $row['userName'] .  "'>" . $row['userName'] .  "</a>";
             }
            echo  "</h4>";
            if (isset($_SESSION["sUserType"]) ) {
              if ($_SESSION["sUserType"]==1) {echo "<form action='php/deletePost.php'><input type='hidden' name='var' value=" . $row['ID'] . "> <button type='submit'>Delete Post</button></form>";}
            }
          echo '<hr>';

            }
          }
            }

              else {
              $sql = "SELECT email, topic, bloguser.userName as userName, userType FROM post INNER JOIN bloguser ON post.userName = bloguser.userName
              where email LIKE  ?
              OR topic LIKE ?
              OR bloguser.userName LIKE ?
               GROUP BY bloguser.userName ";

                    $stmt = mysqli_prepare($connection, $sql);
                    $keyeyword = "%{$lol['keyWord']}%";
                   /* bind parameters for markers */
                   mysqli_stmt_bind_param($stmt, "sss", $keyeyword,$keyeyword,$keyeyword);
                   mysqli_stmt_execute($stmt);
                   mysqli_stmt_bind_result($stmt,$email, $topic, $userName, $userType);
                // run the query

                // fetch a record from result set into an associative array
                while (mysqli_stmt_fetch($stmt)) {
                { // the keys match the field names from the table


                if ($userType==1) {

                    echo  "<span style='color:red;'><a href='profile.php?userName=" . $userName .  "'>" . $userName .  "</a> - Admin</span>";
                }
                else {
                  echo "<a href='profile.php?userName=" . $userName .  "'>" . $userName .  "</a>";
                 }
                echo  "</h4>";

              echo '<hr>';

                }

              }
}

            // echo '<script type="text/javascript">alert("' . $_SESSION["sUserName"]  . '");</script>';
             ?>

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
