
<script type="text/javascript" src="script/validate.js"></script>
<script src="https://www.w3schools.com/lib/w3data.js"></script>
<script type="text/javascript">


<!--  checking script here!! -->
function checkPasswordMatch(e) {
    if (document.getElementById('pass').value != document.getElementById('re-pass').value) {
      makeRed(document.getElementById('pass'));
      makeRed(document.getElementById('re-pass'));
      alert('The two passwords did not match');
      e.preventDefault();
      }
    else if (document.getElementById('fileToUpload').value=='') {

          alert("empty input file");
          e.preventDefault();
    }
}
</script>

<?php include 'php/navbar.php';?>
<article>

<form method="post" action="php/register.php" id="aForm"  enctype="multipart/form-data">
    <fieldset>
  <div class="imgcontainer">
    <img src="image/userIcon.png" alt="Avatar" class="avatar">
  </div>

<div class="centerInput"> <input type="file" name="fileToUpload" id="fileToUpload" required></div>
    <div class="centerInput">
    <input type="text" placeholder="Enter Username" id="userName" name="userName" required></div>

    <div class="centerInput">
    <input type="text" placeholder="Enter Name" id="firstName" name="firstName" required></div>

    <div class="centerInput">
    <input type="text" placeholder="Last Name" id="lastName" name="lastName" required></div>

    <div class="centerInput">
    <input type="password" placeholder="Enter Password" id="pass"  name="pass" required></div>

    <div class="centerInput">
    <input type="password" placeholder="Enter Password" id="re-pass" name="re-pass" required></div>


    <div class="centerInput">
    <input type="text" placeholder="Enter Email" id="email" name="email" required></div>


    <div class="centerInput"><button type="submit">Register</button></div>




</fieldset>
</form>


</article>

<footer>Copyright &copy; </footer>

</div>

</body>
<script>
w3IncludeHTML();
</script>
</html>
