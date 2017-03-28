
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
            include 'php/conn.php';

            $sql = "SELECT email, topic, bloguser.userName, userType FROM post INNER JOIN bloguser ON post.userName = bloguser.userName GROUP BY bloguser.userName ";
            // run the query
            if ($result = mysqli_query($connection, $sql)) {
            // fetch a record from result set into an associative array
            while($row = mysqli_fetch_assoc($result))
            { // the keys match the field names from the table
            echo "<td>";
            echo $row['theText'] . "<h4> By: ";
            if ($row['userType']==1) {

                echo  "<span style='color:red;'><a href='profile.php?userName=" . $row['userName'] .  "'>" . $row['userName'] .  "</a> - Admin</span>";
            }
            else {
              echo "<a href='profile.php?userName=" . $row['userName'] .  "'>" . $row['userName'] .  "</a>";
             }
            echo "<br>" . $row['postStamp'] . "</h4>";
            if (isset($_SESSION["sUserType"]) ) {
              if ($_SESSION["sUserType"]==1) {echo "<form action='php/deletePost.php'><input type='hidden' name='var' value=" . $row['ID'] . "> <button type='submit'>Delete Post</button></form>";}
            }
            echo "</td></tr>";

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
