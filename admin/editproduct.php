<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}


$id=$_GET['id'];


if(isset($_POST['submit']))
  {
    $pname=$_POST['pname'];
    $pid=$_POST['pid'];
    $pdesc=$_POST['pdesc'];
    $pcategory=$_POST['pcategor'];
    $pprice=$_POST['pprice'];
    if($_FILES['image']['name']=='')
    {
      $result=$obj->getproduct($id);
     if($result->num_rows>0)
        {
     while ($row=$result->fetch_assoc()) {
        $file=$row['pimage'];
                          
    }
  }
  }
  else{

    $file=$_FILES['image']['name'];
  }
    
    $temp_location=$_FILES['image']['tmp_name'];
    $_destination="../uploads/";
    move_uploaded_file($temp_location, $_destination.$file);
    $res=$obj->updateproduct($id,$pname,$pid,$pdesc,$pcategory,$pprice,$file);

    if($res)
    {
      header('location:showproduct.php');

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
    <title>Admin Area | Edit Product</title>
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

              <?php 
                      $result=$obj->getproduct($id);

                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          ?>
            <form id="login" action="" class="well" method="POST" enctype = "multipart/form-data">

                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control"  name="pname" title="Enter your Product Name" required value="<?php echo $row['pname'];?>">
                  </div>

                  <div class="form-group">
                  <label>Product id</label>
                    <input type="text" class="form-control" placeholder="Enter Your User Name" name="pid" required pattern="(?=^.{3,20}$)^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$" title="Enter the valid Product name" value="<?php echo $row['pid'];?>"   >
                  </div>

                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="ckeditor" name="pdesc"> <?php echo $row['pdesc'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control" placeholder="Enter Your Product Price" name="pprice" title="Enter your Product Price" required value="<?php echo $row['pprice'];?>">
                  </div>


                  <div class="form-group">
                    <label>Category</label>
                   <select name="pcategor" class="form-control" >
                     <?php 
                     $pcat= $row['pcategory'];
                      $res=$obj->findcategory($pcat);
                      if($res->num_rows>0)
                      {
                        while ($c=$res->fetch_assoc()) {
                          
                      ?>
                      <option value="<?php echo $c['id'];?>" selected><?php echo $c['categoryname'];?></option>
                  

                  <?php 
                        }}
                      $re=$obj->showcategory();
                      if($re->num_rows>0)
                      {
                        while ($r=$re->fetch_assoc()) {
                          
                      ?>
                  <option value="<?php echo $r['id'];?>"><?php echo $r['categoryname'];?></option>
                   <?php } } ?>                    
                   </select>
                  </div>


                  <div class="form-group" class="file btn btn-lg btn-primary">
                    <label>Product Image</label>
                    <input type="file" class="form-control"  name="image"  value="<?php echo $row['pimage'];?>"><?php echo $row['pimage'];?>
                    <img src="../uploads/<?php echo $row['pimage'];?>" class="img-responsive img-rounded" width="60px" height="40px" >
                  </div>



                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Update Product</button>
              </form>
              <?php } } ?>
          </div>
        </div>

      
                  
              
          </div>
        </div>
      </div>
    </section>

 <?php include '../include/footer.php' ?>