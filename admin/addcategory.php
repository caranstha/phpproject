<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}

if(isset($_POST['submit']))
  {
    $categoryname=$_POST['categoryname'];

    $res=$obj->addcategory($categoryname);
  
    if($res)
    {
      header('location:showcategory.php');

    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Add Category</title>
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
                <h3 class="panel-title">Add Category</h3>
              </div>
            <form id="login" action="" class="well" method="POST" >

                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter the Categoryname" name="categoryname" title="Category Name" required>
                  </div>

                  

                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Enter Category</button>
              </form>
          </div>
        </div>

      
                  
              
          </div>
        </div>
      </div>
    </section>

 <?php include '../include/footer.php' ?>