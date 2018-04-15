<?php
include '../include/user.inc.php';//end or class
$obj= new User;

if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $res=$obj->register($fullname,$username,$email,$password);
  
    if($res)
    {
      header('location:login.php');

    }
   
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminStrap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="login" action="" class="well" method="POST" >

                  <div class="form-group">
                    <label>Your Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="fullname" title="Enter your Full Name" required>
                  </div>

                  <div class="form-group">
                  <label>Your User Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your User Name" name="username" required pattern="(?=^.{3,20}$)^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$" title="Enter the valid User name">
                  </div>

                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                  </div>

                  <div class="form-group">
                    <label>Enter New Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" id="txtPassword">
                  </div>

                  <div class="form-group">
                    <label>Confirm Your Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="cpassword" required  title="Password Missmatch" id="txtConfirmPassword">
                  </div>

                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-default btn-block">Register</button>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>© Caran Shrestha</p>
    </footer>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>
 
   <script type="text/javascript">
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

</script>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>




    <script type="text/javascript">

  // polyfill for RegExp.escape
  if(!RegExp.escape) {
    RegExp.escape = function(s) {
      return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
    };
  }

</script>

  </body>
</html>
