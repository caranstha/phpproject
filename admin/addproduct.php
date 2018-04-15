<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}

if(isset($_POST['submit']))
  {
    $pname=$_POST['pname'];
    $pid=$_POST['pid'];
    $pdesc=$_POST['pdesc'];
    $pcategory=$_POST['pcategory'];
    $pprice=$_POST['pprice'];
    $file=$_FILES['image']['name'];
    $temp_location=$_FILES['image']['tmp_name'];
    $_destination="../uploads/";
    move_uploaded_file($temp_location, $_destination.$file);
    $res=$obj->addproduct($pname,$pid,$pdesc,$pcategory,$pprice,$file);
  
    if($res)
    {
      header('location:showproduct.php');

    }
   
}
?>
 <script src="../include/ckeditor/ckeditor.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Add Product</title>
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
                <h3 class="panel-title">Product Information</h3>
              </div>
            <form id="login" action="" class="well" method="POST" enctype = "multipart/form-data">

                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Product Name" name="pname" title="Enter your Product Name" required>
                  </div>

                  <div class="form-group">
                  <label>Product id</label>
                    <input type="text" class="form-control" placeholder="Enter Your User Name" name="pid" required pattern="(?=^.{3,20}$)^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$" title="Enter the valid Product name">
                  </div>

                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="ckeditor" name="pdesc"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" placeholder="Enter Your Product Price" name="pprice" title="Enter your Product Price" required>
                  </div>


                  <div class="form-group">
                    <label>Category</label>
                   <select name="pcategory" class="form-control">

                  <?php 
                      $result=$obj->showcategory();
                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          
                      ?>
                  <option value="<?php echo $row['id'];?>"><?php echo $row['categoryname'];?></option>
                   <?php } } ?>                    
                   </select>
                  </div>


                  <div class="form-group" class="file btn btn-lg btn-primary">
                    <label>Product Image</label>
                    <input type="file" class="form-control"  name="image" required="">
                  </div>



                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Save Product</button>
              </form>
          </div>
        </div>

      
                  
              
          </div>
        </div>
      </div>
    </section>

 <?php include '../include/footer.php' ?>
   