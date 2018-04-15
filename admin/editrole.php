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


$id=$_GET['id'];


if(isset($_POST['submit']))
  {
    $role=$_POST['role'];
    
    $res=$obj->updaterole($id,$role);

    if($res)
    {
      header('location:showuser.php');

    }
   
}
?>
 <script src="include/ckeditor/ckeditor.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Edit Role</title>
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
                <h3 class="panel-title">User Role Edit</h3>
              </div>

        
            <form id="login" action="" class="well" method="POST" enctype = "multipart/form-data">

                  


                  <div class="form-group">
                    <label>User Role</label>
                   <select name="role" class="form-control" >
              
                                     <option value="admin">Admin</option>
                   <option value="editor">Editor</option>

                                
                   </select>
                  </div>



                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Update Role</button>
              </form>
         
          </div>
        </div>

      
                  
              
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
      <script src="../include/ckeditor/ckeditor.js"></script>
  </body>
</html>
