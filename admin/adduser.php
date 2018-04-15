<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}
if($_SESSION['role']=='editor')
{
  header('location:showuser.php');
}

if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $role=$_POST['role'];

    $res=$obj->register($fullname,$username,$email,$password,$role);
  
    if($res)
    {
      header('location:showuser.php');

    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | User Registration</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

           <?php include '../include/header.php' ?>

   

    <section id="main">
      <div class="container">
        
          <div class="row justify-content-md-center">
              

               
                  <div class="row">
                     <?php include '../include/sidebar.php' ?>
          <div class="col-md-9">
            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">User Registration</h3>
              </div>
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
                    <label>Role</label>
                   <select name="role" class="form-control">

                  <option value="admin">Administrator</option>
                  <option value="editor">Editor</option>                     
                   </select>
                  </div>

                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Register</button>
              </form>
          </div>
        </div>

      
                  
              
          </div>
        </div>
      </div>
    </section>


    <?php include '../include/footer.php' ?>