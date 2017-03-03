
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/lab6.css" rel="stylesheet">

 </head>

 <body>
   <?php
   include "lab6-data.php";

    ?>
 <div class="container">
    <div class="row">
       <div class="col-md-3">
       </div>
       <div class="col-md-6">
          <div id="login">
             <div class="page-header">
                <h2>Login</h2>
             </div>
             <form role="form">
               <?php
               if ( empty($email) ) { echo "<div class='form-group has-error'>"; }
               else {echo "<div class='form-group '>";}
                 ?>
                 <label for="exampleInputEmail1">Email address</label>
                 <input type="email" class="form-control" name="email" value="<?php echo $email ?>">
                 <?php if ( empty($email) ) { echo "<p class='help-block'>Email and password not found</p>"; }  ?>
                <!--  <p class="help-block">Enter an email</p>-->
               </div>
               <?php
               if ( empty($password) ) { echo "<div class='form-group has-error'>"; }
               else {echo "<div class='form-group '>";}
                 ?>
                 <label for="exampleInputPassword1">Password</label>
                 <input type="password" class="form-control" name="password" value="<?php $password ?>" >

                 <?php if ( empty($password) ) { echo "<p class='help-block'>Email and password not found</p>"; }  ?>
                <!--  <p class="help-block">Enter an email</p>-->
               </div>
               <div class="form-group">
                 <label for="exampleInputFile">Server</label>
                 <select name="server" class="form-control">
                   <!--Replace the following elements with PHP-->
                   <?php for ($x = 1; $x <=5 ; $x++) {
                      echo "<option>Server $x </option>"; }?>
                 </select>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
             </form>
          </div>
       </div>
       <div class="col-md-3">
       </div>
    </div>
 </div>  <!-- end container -->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
  <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
 </body>
 </html>
